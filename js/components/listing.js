import loader from "../partials/loader";

export default (element) => {
    const resultsContainer = element.querySelector('[data-element="results"]');
    const form = element.querySelector('[data-element="form"]');
    const submitButton = form.querySelector('button[type="submit"]')
    const ajaxAction = form.dataset.action;
    const apiEndpoint = form.dataset.apiEndpoint;
    const method = form.dataset.method;

    const handleSearch = () => {
        resultsContainer?.innerHTML = loader();
        submitButton?.setAttribute('disabled', true)

        fetch(apiEndpoint, {
            method, 
            body: {
                action: ajaxAction
            }
        })
            .then((res) => {
                resultsContainer.innerHTML = 'results found'
            }) 
            .catch((error) => {
                console.error(error);
            })
            .finally(() => {
                submitButton?.removeAttribute('disabled');
            })
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        handleSearch()
    })
}   