<input type="checkbox" id="updateProductModal" class="modal-toggle" />
<div id="triggerUpdatingModal" class="modal">
  <div class="modal-box">
    <form method="POST" id="update_product_form">
        @csrf
        <input type="text" class="hidden" id="up_id" name="up_id" >
        <h3 class="font-bold text-lg">Update product</h3>
        <div class="flex flex-col">
          <!-- if there is a button in form, it will close the modal -->

          <div class="error_container">

          </div>

          <div class="felx flex-col my-5">
            <p class="font-bold">Product Name</p>
            <input type="text" placeholder="Product Name" class="input input-bordered w-full mt-2" name="up_name" id="up_name" />
          </div>

          <div class="felx flex-col mb-5">
            <p class="font-bold">Product Price</p>
            <input type="number" placeholder="Product Price" class="input input-bordered w-full mt-2" name="up_price" id="up_price" />
          </div>
          <div class="modal-action">
            {{-- <a href="#" class="btn">Yay!</a> --}}
            <button class="btn btn-neutral update_product">Update product</button>
           </div>
        </div>
      </form>
  </div>
  {{-- <label class="modal-backdrop" for="updateProductModal">Close</label> --}}
</div>
