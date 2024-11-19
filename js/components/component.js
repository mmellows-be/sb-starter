export default (element) => {
    const button = element.querySelector('[data-element="button"]');
    const number = element.querySelector('[data-element="number"]');
    let i = 1;
    
    button.addEventListener('click', (e) => {
        i++;
        number.innerHTML = i
    })
}