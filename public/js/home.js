import { Table } from "../../private/js/class/Table.js";
import { Element } from "../../private/js/class/Element.js";
import { Button } from "../../private/js/class/Button.js";

const table = new Table('applications');

new Button('all-btn', () => location.reload(true));
new Button('sent-btn', () => table.filterTable(collectionData, 0));
new Button('seen-btn', () => table.filterTable(collectionData, 1));
new Button('interviewed-btn', () => table.filterTable(collectionData, 2));
new Button('position-btn', () => table.filterTable(collectionData, 3));
new Button('order-positions', () => table.organizeTable(collectionData, "POSITION"))

