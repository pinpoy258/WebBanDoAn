    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="themNhacungcapModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Nhà Cung Cấp</h1>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeNhacungcap">

       
    <div class="modal-body">
      <div class="mb-3">
        <label>Chọn Loại Sản Phẩm</label>
        <select wire:model.defer="loaisp_id" required class="form-control">
          <option value="">--Chọn Loại Sản Phẩm--</option>
          @foreach ($loaisps as $loaiItem)
          <option value="{{ $loaiItem->id }}">{{ $loaiItem->tenloai }}</option>
          @endforeach
        </select>
        @error('loaisp_id') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="mb-3">
          <label>Tên Nhà Cung Cấp</label>
          <input type="text" wire:model.defer="tennhacungcap" class="form-control">
          @error('tennhacungcap') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label>Nhà Cung Cấp Slug</label>
          <input type="text" wire:model.defer="slug" class="form-control">
          @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label>Trạng Thái</label> <br/>
          <input type="checkbox" wire:model.defer="trangthai" /> Checked=Hidden, Un-Checked=Visible
          @error('trangthai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
     </div>
    <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>

    <!-- Nhac Cung Cap Update Modal -->
    <div wire:ignore.self class="modal fade" id="capnhatNhacungcapModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Nhà Cung Cấp</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
          <div class="spinner-border text-primary" role="status">
             <span class="visually-hidden">Loading...</span>
            </div>Loading...
        </div>        
    <div wire:loading.remove>

        
        <form wire:submit.prevent="capnhatNhacungcap">
  
    <div class="modal-body">
    <div class="mb-3">
        <label>Chọn Loại Sản Phẩm</label>
        <select wire:model.defer="loaisp_id" required class="form-control">
          <option value="">--Chọn Loại Sản Phẩm--</option>
          @foreach ($loaisps as $loaiItem)
          <option value="{{ $loaiItem->id }}">{{ $loaiItem->tenloai }}</option>
          @endforeach
        </select>
        @error('loaisp_id') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="mb-3">
          <label>Tên Nhà Cung Cấp</label>
          <input type="text" wire:model.defer="tennhacungcap" class="form-control">
          @error('tennhacungcap') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label>Nhà Cung Cấp Slug</label>
          <input type="text" wire:model.defer="slug" class="form-control">
          @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label>Trạng Thái</label> <br/>
          <input type="checkbox" wire:model.defer="trangthai" style="width:70px;height=70px;" /> Checked=Hidden, Un-Checked=Visible
          @error('trangthai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
     </div>
    <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
      </div>
      </form>
  </div>

    </div>
  </div>
</div>


    <!-- Nhac Cung Cap Update Modal -->
    <div wire:ignore.self class="modal fade" id="xoaNhacungcapModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Nhà Cung Cấp</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
          <div class="spinner-border text-primary" role="status">
             <span class="visually-hidden">Loading...</span>
            </div>Loading...
        </div>        
    <div wire:loading.remove>

        
        <form wire:submit.prevent="destroyNhacungcap">
  
    <div class="modal-body">
        <h4>Bạn có chắc muốn xóa ?</h4>
    </div>
    <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Vâng. Xóa</button>
      </div>
      </form>
  </div>

    </div>
  </div>
</div>
