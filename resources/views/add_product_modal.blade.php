<input type="checkbox" id="addProductModal" class="modal-toggle" />
<div id="triggerModal" class="modal">
  <div class="modal-box">
    <form method="POST" id="add_product_form">
        @csrf
        <h3 class="font-bold text-lg">Add new product</h3>
        <div class="flex flex-col">
          <!-- if there is a button in form, it will close the modal -->

          <div class="error_container">

          </div>

          <div class="felx flex-col my-5">
            <p class="font-bold">Product Name</p>
            <input type="text" placeholder="Product Name" class="input input-bordered w-full mt-2" name="name" id="name" />
          </div>

          <div class="felx flex-col mb-5">
            <p class="font-bold">Product Price</p>
            <input type="number" placeholder="Product Price" class="input input-bordered w-full mt-2" name="price" id="price" />
          </div>
          <div class="modal-action">
            {{-- <a href="#" class="btn">Yay!</a> --}}
            <button class="btn btn-neutral add_product">Add product</button>
           </div>
        </div>
      </form>
  </div>
  {{-- <label class="modal-backdrop" for="addProductModal">Close</label> --}}
</div>
