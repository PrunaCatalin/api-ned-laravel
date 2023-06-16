const puppeteer = require('puppeteer');

async function hasCdcProps(page) {
    let props = await page.evaluate(() => {
        let objectToInspect = window,
            result = [];
        while(objectToInspect !== null) {
            result = result.concat(Object.getOwnPropertyNames(objectToInspect));
            objectToInspect = Object.getPrototypeOf(objectToInspect);
        }
        return result.filter(i => i.match(/.+_.+_(Array|Promise|Symbol)/ig));
    });
    return props.length > 0;
}

async function hookRemoveCdcProps(page) {
    await page.evaluateOnNewDocument(() => {
        let objectToInspect = window,
            result = [];
        while(objectToInspect !== null) {
            result = result.concat(Object.getOwnPropertyNames(objectToInspect));
            objectToInspect = Object.getPrototypeOf(objectToInspect);
        }
        result.forEach(p => p.match(/.+_.+_(Array|Promise|Symbol)/ig)
            && delete window[p] && console.log('removed',p))

        const content = page.content();
        console.log(content);
    });
}

async function run() {
    const browser = await puppeteer.launch({ args: ['--no-sandbox', '--disable-setuid-sandbox'] });

    const page = await browser.newPage();
    await page.setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0')
    if (await hasCdcProps(page)) {
        await hookRemoveCdcProps(page);
    }
    const result = await page.evaluate(() => {

    });
    await page.goto('https://ubotstudio.com/');
    const content = await page.content();
    console.log(content);
    // Restul codului aici

    await browser.close();
}
run();
