<template>
    <ContactList endpoints="/api/contacts"/>
</template>
<script>
    import ContactList from '../ContactList';
    export default {
        name: 'ContactIndex',
        components:{
            ContactList
        },
    }
</script>
