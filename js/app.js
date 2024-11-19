import Component from './components/component';
import listing from './components/listing';
import _ from './utils/selector';

const globalCallback = () => {
    // ...add functionality here if there is anything that needs to be called on everypage
}

// define all the elements with there relevant component
const elements = [
    {
        el: _('component'),
        component: Component
    },
    {
        el: _('listing'),
        component: listing
    }
]

// loops through all elements and initialises the elements on the page
elements.forEach(({el, component}) => {
    if (el.length === 0) {
        return;
    }

    el.getAllElements().forEach((element) => {
        try {
            if (typeof component == 'class') {
                new component(element)
            } else {
                component(element)
            }
        } catch (error) {
            console.error(`Error with ${el.getName()}`, error)
        }
    })
})

// function that should be called on all pages...
globalCallback()