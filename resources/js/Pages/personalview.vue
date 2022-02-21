<template>
    <div class="text-center font-semibold mt-5 " >
     <h1 class="mt-5 justify-content-center">
             Noetic School Data
     </h1>
     <div class="container">
        <div class="mt-5" style="margin-top:20px;">
        <div class="flex justify-center">
        <div class="pt-5 xl:w-96 gap-2">
            <input v-model="search" type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">     
        </div>&nbsp;&nbsp;
        
           <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                Country
            </label>
             <select v-model="country" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionCountry" :value="item.id" :key="item.id">{{ item.country }}</option>
                </select>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                State
            </label>
            <div class="relative">
                <select v-model="state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select one</option>
                <option v-for="item in optionState" :value="item.id" :key="item.id">{{ item.state}}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                City
            </label>
            <select v-model="city" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
               <option selected value="">Select one</option>
                <option v-for="item in optionCity" :value="item.id" :key="item.id">{{ item.city}}</option>

                </select>
            </div>
       </div>
        <div class=" xl:w-60 gap-2" style="margin-left:20px;">
         <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                            Skills
                        </label>
                  
                  
                    <div>
                    <Multiselect
                    v-model="multiselect_example"
                    :options="optionSkill"
                    mode="tags"
                    placeholder="Select one or more"
                    :searchable="true"
                    :createTag="true"
                    />
                </div>
                </div> 
        </div>
        </div>
     </div>
    </div>
     <div class="p-10">
            <table class="border-collapse  border   shadow-md  w-full">
                <thead class="border-1 rounded bg-blue-500 table-sortable text-white">
                <tr class="font-semiboldbold ">
                    <td class="" >Id<i class="fa fa-sort" style="font-size:18px"></i> </td>
                    <td>Name <i class="fa fa-sort" style="font-size:18px"></i></td>
                    <td class="" > Email<i class="fa fa-sort" style="font-size:18px"></i> </td>
                    <td class="" > Phone<i class="fa fa-sort" style="font-size:18px"></i> </td>                   
                    <td>country <i class="fa fa-sort" style="font-size:18px"></i></td>
                    <td>State<i class="fa fa-sort" style="font-size:18px"></i></td>
                    <td>City <i class="fa fa-sort" style="font-size:18px"></i></td>
                    <td>Skills <i class="fa fa-sort" style="font-size:18px"></i></td>

                    <td class="text-center justify-center" colspan="2">Action<i class="fa fa-sort" style="font-size:18px"></i> </td>

                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in tableData.data" class="border h-10" :key="index" >
                     <td>{{item.id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.email}} </td>
                    <td>{{item.phone}}</td>
                    <td>{{item.country_id}} </td>                   
                    <td>{{item.state_id}} </td>
                    <td>{{item.city_id}}</td>
                    <td>{{item.skill}}</td>
                     <!-- <td>
                         <span v-for="ele in item.skills">{{ele.name}}</span>
                     </td> -->
                   
                    <td>
                        <div style="display: flex; align-items: center; justify: center;">
                            <a :href="'/edit/'+item.id">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: red; " width="20" height="20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" @click.prevent="deleteData(item.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: red; " width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </td>

                </tr>
                </tbody>

            </table>
                        <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
            </div>
            <!-- <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div v-if="tableData">
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{tableData.meta.from}}</span>
                    to
                    <span class="font-medium">{{tableData.meta.to}}</span>
                    of
                    <span class="font-medium">{{tableData.meta.total}}</span>
                    results
                </p>
                </div> -->
                <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <!-- Heroicon name: solid/chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    </a>
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 1 </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 2 </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"> 3 </a>
                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"> ... </span>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"> 8 </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 9 </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 10 </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    </a>
                </nav>
                </div>
            </div>
            </div>

    
    
</template>
<script>
import Multiselect from '@vueform/multiselect';
export default {
    name: 'personalview',
    components: {Multiselect},
     data() {
         return{
            tableData:[],
            search:'',
            country:'',
            state:'',
            city:'',
                    
            multiselect_example:[],
             tags:'tags',
            options: [
                {value:'js',label:'Javascript'},
                {value:'jsx',label:'JSX'},
                {value:'ts',label:'Typescript'}
            ],
            optionCountry:[] ,
            optionState:[],
            optionCity:[],
            optionSkill:[],
            
        
    }

     },
     methods: {
         fetchData(){
     axios.post('/api/country/').then(response => {
             if(response.status === 200) {
                 this.optionCountry = response.data.data
             
                 }
               })
                 axios.post('/api/skill/').then(response => {
             if(response.status === 200) {
                 this.optionSkill = response.data.data.map(a => ({
                     value: a.id,
                     label: a.name
                 }))
             
                    }
                 })
          },
  fetchState(){
    axios.post('/api/state/'+ this.country).then(response => {
                   if(response.status === 200) {
                  this.optionState = response.data.data
             
                 }
        })
  },
  fetchCity(){
    axios.post('/api/city/'+ this.state).then(response => {
                   if(response.status === 200) {
                  this.optionCity = response.data.data
             
                 }
        })
  } ,
        fetchList(){
    
            const payload = {
              search : this.search,
                 country_id: this.country,
                state_id: this.state,
                city_id:this.city,
                skills:this.multiselect_example
            }
            axios.post('/api/view', payload).then(response => {
                if(response.status === 200){
                   this.tableData = response.data
                }
            })
        },
        },
        created(){
            this.fetchList()
            this.fetchData()
        },
        watch:{
            'search':{
            handler: 'fetchList'
            },
        
            country: function(){
                this.fetchState();
                this.fetchList();
            },
             state: function(){
                this.fetchCity();
                this.fetchList();
            },
             'city':{
                  handler:'fetchList'
             },

            'multiselect_example':{
                handler:'fetchList'
            }
        }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
