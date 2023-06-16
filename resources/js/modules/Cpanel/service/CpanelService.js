import router  from "~/router";
class CpanelService {
    isTabActive(name)
    {
        return router.currentRoute._rawValue.meta.prettyName === name;
    }
}
export default new CpanelService()
