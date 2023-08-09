<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category *</label>
                                <input type="text" class="form-control" id="category">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Amount *</label>
                                <input type="text" class="form-control" id="amount">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Description *</label>
                                <input type="text" class="form-control" id="description">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Date *</label>
                                <input type="date" class="form-control" id="date">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="model-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button  type="submit" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
        $('#insertData').on('submit',async function(e){
            e.preventDefault()

            let category=document.getElementById("category").value;
            let amount=document.getElementById("amount").value;
            let description=document.getElementById("description").value;
            let date=document.getElementById("date").value;
            document.getElementById('model-close').click();
            if(category.length===0){

                errorToast('Category required')
            }else if(amount.length===0){
                errorToast('Amount required')
            }else if(description.length===0){
                errorToast('Description required')
            }else if(date.length===0){
                errorToast('Date required')
            }else{

                $('#create-modal').modal('hide') //jquery use
               
                showLoader();
                let res=await axios.post('/expense-create',{
                    category:category,
                    amount:amount,
                    description:description,
                    date:date
                })
                hideLoader();
                if(res.status==201){
                    successToast('Created Success')
                    $('#create-modal').trigger("reset") 
                    await ExpenseList()
                }else{
                    errorToast('Request Failed')
                }

            }
        })

</script>




