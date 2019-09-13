<template>
    <div>
        <div v-if="loading">Loadin...</div>
        <div v-else>
            <div class="flex justify-between">
                <a class="text-blue-400 cursor-pointer" @click="$router.back()">
                    <span class="text-xs">&#65308;</span> Back
                </a>
                <div class="relative">
                    <router-link :to="'/contacts/'+contact.contact_id+'/edit'" class="px-4 py-2 rounded text-sm text-green-500 border-green-500 font-bold mr-2">Edit</router-link>
                    <a href="#" @click="modal =! modal" class="px-4 py-2 rounded text-sm text-red-500 border-red-500 font-bold">Delete</a>
                    <div v-if="modal" class="absolute bg-blue-900 text-white rounded-lg z-20 p-8 w-64 right-0 mt-2 mr-4">
                        <p>Are you sure you want to delete this record?</p>
                        <div class="flex items-center mt-6 justify-end">
                            <button @click="modal =! modal" class="text-white pr-4">Cancel</button>
                            <button class="px-4 py-2 bg-red-500 rounded text-sm font-bold text-white" @click="destroy">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10" v-if="modal" @click="modal =! modal"></div>
            </div>
            <div class="flex items-center pt-6">
                <UserCircle :name="contact.name"/>
                <div class="pl-5 text-xl capitalize">{{contact.name}}</div>
            </div>
            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Contact</p>
            <p class="pt-2 text-blue-400">{{contact.email}}</p>
            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Company</p>
            <p class="pt-2 text-blue-400">{{contact.company}}</p>
            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Birthday</p>
            <p class="pt-2 text-blue-400">{{contact.birthday}}</p>
        </div>
    </div>
</template>
<script>
    import UserCircle from '../UserCircle';
    export default {
        name: 'ContactShow',
        components:{
            UserCircle
        },
        mounted(){
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response=>{
                    this.contact = response.data.data
                    this.loading = false
                })
                .catch(error=>{
                    this.loading = false
                    if(error.response.status === 404){
                        this.$router.push('/contacts')
                    }
                });
        },
        data: function(){
            return {
                loading: true,
                modal: false,
                contact: null
            }
        },
        methods:{
            destroy: function(){
                axios.delete('/api/contacts/' + this.$route.params.id)
                .then(response=>{
                    this.$router.push('/contacts')
                })
                .catch(error=>{
                    alert('Internal Error. Unable to delete contact.')
                })
            }
        }
    }
</script>
