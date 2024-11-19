// global wpAjaxUrl

export default (action, data) => {
    return {
        url: wpAjaxUrl,
        body: {
            ...data,
            action
        }
    }
}