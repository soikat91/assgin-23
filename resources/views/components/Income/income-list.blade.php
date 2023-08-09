<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Income List</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">
                {{--Table Data--}}
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
        IncomeList()
        async function IncomeList(){
            showLoader()
            let res=await axios.get('/income-list');
            hideLoader()
            let tableData=$('#tableData');//jquery
            let tableList=$('#tableList');//jquery

            tableData.DataTable().destroy()
            tableList.empty()

            res.data.forEach(function(item,index){

                let row=`
                        <tr>
                            <td>${index+1}</td>
                            <td>${item.category}</td>
                            <td>${item.amount}</td>
                            <td>${item.description}</td>                       
                            <td>${item.date}</td>                       
                            <td>
                                <button data-id=${item.id} class="edit btn btn-sm btn-outline-primary"> Edit</button> 
                                <button data-id=${item.id} class="delete btn btn-sm btn-outline-primary"> Delete</button>
                            </td>                       
                        </tr>
                    `
                   // protita customer er alada alad id dhorer jnno data-id  use kra hoice
                tableList.append(row)
            })
            // let editData=${'.edit'}
            // let deleteData=${'.delete'}

            $('.edit').on('click',async function(){

                let id=$(this).data('id');
               await getIncomeId(id)
                $('#update-modal').modal('show')
                
            })

            $('.delete').on('click',function(){
                let id=$(this).data('id')
                //alert(id)
                $('#delete-modal').modal('show')
                $('#incomeIdDelete').val(id)

            })


            tableData.DataTable({
                order:[['0','desc']],
                lengthMenu:[5,10,10,20,30,40,50],
                language:{
                    paginate:{
                        next:'&#8594;',
                        previous:'&#8592;',
                    }
                }
            })

        }
</script>