<template>
    <div class="rounded-full text-white bg-blue-400 flex justify-center items-center w-10 h-10 border border-gray-400">{{userCircle}}</div>
</template>
<script>
    export default {
        name: 'UserCircle',
        props:[
            'name'
        ],
        computed:{
            userCircle: function(){
                return (this.name.toLowerCase().split(' ').map((s)=>s.charAt(0).toUpperCase()+s.substring(1)).join(' ')).match(/[A-Z]/g).slice(0,2).join('');
            }
        }
    }
</script>
