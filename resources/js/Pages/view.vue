<template>
     <div class="text-center font-semibold mt-5 " ><i> This are Users Data</i>

        <div class="p-10">
            <table class="border-collapse  border   shadow-md  w-full">
                <thead class="border-1 rounded bg-blue-500 table-sortable text-white">
                        <tr class="font-semiboldbold ">
                            <td class="p-3" > Name.<i class="fa fa-sort" style="font-size:16px"></i> </td>
                            <td>Password <i class="fa fa-sort" style="font-size:16px"></i></td>
                            <td>Action<i class="fa fa-sort" style="font-size:16px"></i> </td>
                        
                        </tr>
                </thead>
                <tbody>
                       <tr v-for="(ele, index) in tableData" class="border h-10" >
                                <td class="p-2">{{ele.name}}</td>
                                <td>{{ele.password}} </td>
                        </tr>
                </tbody>

            </table>
        </div>
     </div>

    
</template>
<script>
export default {
    name:"view",
     data(){
            return{
                tableData:[]
            }
        },
        methods:{
            fetchList(){
                axios.post('/api/noetic/list').then(response =>{
                    if(response.status === 200){
                       this.tableData = response.data.data
                    }
                })
            }
        },
        created() {
            this.fetchList();

        }
}
</script>