export default (element, type = 'behaviour') => {

    const selector = `[data-${type}="${element}"]`;
    const elements = document.querySelectorAll(selector);

    return {
        getName: () => elements[0]?.dataset?.[type] ?? elements.id ?? elements.tagName ?? 'unknown',
        getElement: () => elements[0],
        getAllElements: () => elements,
        getallElementsAsArray: () => Array.from(elements),
        selector
    }
}