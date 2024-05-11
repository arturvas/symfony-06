import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.element.textContent = `You have clicked 0 times`;
        this.counter = 0;
        this.element.addEventListener('click', () => {
            this.counter += 1;
            this.element.innerHTML = `You have clicked ${this.counter} times`;
        })

    }
}