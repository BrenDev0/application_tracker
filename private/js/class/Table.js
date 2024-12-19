import { Element } from './Element.js';

export class Table extends Element{
    constructor(elementId){
        super(elementId);
    }

    filterTable(collection, status){
        const filtered = collection.filter((item)=> item.status === status);
    
        this.clearChildren();
    
        filtered.forEach(element => {
            let row = document.createElement('tr');
            for(let key in element){
                if(key != 'id'){
                   if(key === 'status'){
                        let data = document.createElement('td');
                        
                        switch(element[key]){
                            case 0:
                                data.appendChild(document.createTextNode('Sent'));
                                break;
                            case 1:
                                data.appendChild(document.createTextNode('Seen'));
                                break;
                            case 2:
                                data.appendChild(document.createTextNode('Interviewed'));
                                break;
                            case 3:
                                data.appendChild(document.createTextNode('Position'));
                                break;       
                            default:
                                break;
                        }
    
                        row.appendChild(data);
                   } else {
                        let data = document.createElement('td');
                        data.appendChild(document.createTextNode(element[key]));
                        row.appendChild(data);
                   }
                }
            }
            this.insert(row);
        });
    }
}