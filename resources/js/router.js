import Vue from 'vue';
import VueRouter from 'vue-router';
import ContactCreate from './components/Views/ContactCreate.vue';
import ContactShow from './components/Views/ContactShow.vue';
import ContactEdit from './components/Views/ContactEdit.vue';
import ContactIndex from './components/Views/ContactIndex.vue';
import BirthdayIndex from './components/Views/BirthdayIndex';
import Logout from './Actions/Logout';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {path:'/',component: ContactIndex, meta: {title: 'Welcome'}},
        {path:'/contacts',component: ContactIndex, meta: {title: 'Contacts'}},
        {path:'/contacts/create',component:ContactCreate, meta: {title: 'Add New Contact'}},
        {path:'/contacts/:id',component:ContactShow, meta: {title: 'Details for Contact'}},
        {path:'/contacts/:id/edit',component:ContactEdit, meta: {title: 'Edit Contact'}},
        {path:'/birthdays',component:BirthdayIndex, meta: {title: 'This Month\'s Birthday'}},
        {path:'/logout',component:Logout},
    ],
    mode: 'history'
});
