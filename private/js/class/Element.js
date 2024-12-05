export class Element{
    constructor(elementId){
        this.element = document.getElementById(elementId);
    }

    clearElement(){
        while (this.element.lastChild){
            this.element.removeChild(this.element.lastChild)
        }
    }

    functionality(type, method){
        this.element.addEventListener(type, () => method);
    }

}