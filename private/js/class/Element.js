export class Element{
    constructor(elementId){
        this.element = document.getElementById(elementId);
    }

    clearChildren(){
        while (this.element.lastChild){
            this.element.removeChild(this.element.lastChild)
        }
    }

    insert(child){
        this.element.append(child);
    }



    functionality(type, method){
        this.element.addEventListener(type, () => method);
    }

}