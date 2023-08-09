
<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category *</label>
                                <input type="text" class="form-control" id="categoryUpdate" value="">
                                <input type="hidden" class="form-control" id="incomeID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Amount *</label>
                                <input type="text" class="form-control" id="amountUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Description *</label>
                                <input type="text" class="form-control" id="descriptionUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Date *</label>
                                <input type="date" class="form-control" id="dateUpdate">
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-model-close" class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button  type="submit" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    async function getExpenseId(id) {

        document.getElementById('incomeID').value=id;      

    //    showLoader()
       let res=await axios.post('/expense-by-id',{id:id})
       document.getElementById('categoryUpdate').value=res.data['category']
       document.getElementById('amountUpdate').value=res.data['amount']
       document.getElementById('descriptionUpdate').value=res.data['description']
       document.getElementById('dateUpdate').value=res.data['date']
        hideLoader()
        
    }

    $('#updateData').on('submit',async function(e){
        e.preventDefault();       
        let categoryUpdate=document.getElementById('categoryUpdate').value
        let amountUpdate=document.getElementById('amountUpdate').value
        let descriptionUpdate=document.getElementById('descriptionUpdate').value
        let dateUpdate=document.getElementById('dateUpdate').value
        let incomeID=document.getElementById('incomeID').value
        
        if(categoryUpdate.length===0){
            errorToast('Category Required')

        }else if(amountUpdate.length===0){

            errorToast('Amount Required')
        }else if(descriptionUpdate.length===0){

            errorToast('Description Required')             
        }else{
            $('#update-modal').modal('hide')
            showLoader()
            let res=await axios.post('/expense-update',{
                id:incomeID,
                category:categoryUpdate,
                amount:amountUpdate,
                description:descriptionUpdate,
                date:dateUpdate,
            })
            hideLoader()

            if(res.status===200 && res.data===1){
                
                successToast('Updated Success')
                $('#update-modal').trigger("reset")
                await ExpenseList()
                
            }else{

                errorToast("Request Failed")    
            }
        }   
       

      })
  
</script>
