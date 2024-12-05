export class Button {
    constructor(btn, method, collection=false){
        if(collection){
            this.buttons = document.getElementsByClassName(btn);
            for(let i = 0; i < this.buttons.length; i++){
                this.buttons[i].addEventListener('click', method);
            }
        } else {
            this.button = document.getElementById(btn);
            this.button.addEventListener('click', method);
        }
    }
}