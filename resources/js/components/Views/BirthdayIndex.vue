<template>
    <ContactList endpoints="/api/birthdays"/>
</template>
<script>
    import ContactList from '../ContactList';
    export default {
        name: 'BirthdayIndex',
        components:{
            ContactList
        },
    }
</script>
