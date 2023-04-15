import index from './components/index.vue'
import edit from './components/edit.vue'
import createPosition from './components/createPosition.vue'
import createEmploye from './components/createEmploye.vue'
import positionTable from './components/positionTable.vue'

export const routes = [
    {
        path: "/",
        name : "index",
        component : index
    },
    {
        path: "/position",
        name : "positiontable",
        component : positionTable
    },
    {
        path: "/create/employe",
        name : "createemploye",
        component : createEmploye
    },
    {
        path: "/create/position",
        name : "createposition",
        component : createPosition
    },
    {
        path: "/employe/edit/:id",
        name : "edit",
        component : edit
    },
];