<div>

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Thanh Toán</h4>
            <hr>

            @if($this->tongGiaTien != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Tổng Giá Tiền Đơn Hàng :
                            <span class="float-end">{{ number_format($this->tongGiaTien) }}VNĐ</span>
                        </h4>
                        <hr>
                        <small>* Hàng sẽ được giao từ tùy vị trị gần hoặc xa.</small>
                        <br/>
                        <small>* Bao gồm thuế và các chi phí khác ?</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Thông Tin Cơ Bản
                        </h4>
                        <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Họ Tên Đầy Đủ</label>
                                    <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Số Điện Thoại</label>
                                    <input type="number" wire:model.derfer ="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Địa Chỉ Email </label>
                                    <input type="email" wire:model.derfer ="email" id="email" class="form-control" placeholder="Enter Email Address" />
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" wire:model.derfer ="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" />
                                    @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <label>Full Địa Chỉ</label>
                                    <textarea wire:model.derfer ="diachi" id="diachi" class="form-control" rows="2"></textarea>
                                    @error('diachi') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label>Chọn Phương Thức Thanh Toán </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Thanh Toán Khi Nhận Hàng</button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Thanh Toán Online</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane active Show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Thanh Toán Khi Nhận Hàng</h6>
                                                <hr/>
                                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Đặt Hàng (Thanh Toán Khi Nhận Hàng)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Đang Đặt Hàng 
                                                    </span>
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Thanh Toán Online</h6>
                                                <hr/>
                                                {{-- <button type="button" wire:loading.attr="disabled" class="btn btn-warning">Thanh Toán Ngay (Online Payment)</button> --}}
                                                <div >
                                                    <div id="paypal-button-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>

            </div>
            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h4>Không có sản phẩm trong giỏ hàng để thanh toán</h4>
                    <a href="{{ url('collections') }}" class="btn btn-warning">Mua Ngay</a>
                </div>
            @endif

        </div>
    </div>

</div>


@push('scripts')

    <script src="https://www.paypal.com/sdk/js?client-id=AYbEY9mFh7qhuQylgII92lv13Qq1XLeB7_rNQFgo6NSzFMyxZUqhamoA2coqrDcU5QJggW657uEZxfkI&currency=USD"></script>
    <script>
        paypal.Buttons({
            onClick: function()  {

                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value
                    || !document.getElementById('phone').value
                    || !document.getElementById('email').value
                    // || !document.getElementById('pincode').value
                    || !document.getElementById('diachi').value
                ) 
                {
                    Livewire.emit('validationForAll');
                    return false;
                }else{

                    @this.set('fullname', document.getElementById('fullname').value );
                    @this.set('email', document.getElementById('email').value );
                    @this.set('phone', document.getElementById('phone').value );
                    // @this.set('pincode', document.getElementById('pincode').value );
                    @this.set('diachi', document.getElementById('diachi').value );
                }
            },
          // Sets up the transaction when a payment button is clicked
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: '0.1' //"{{ $this->tongGiaTien }}" // Can also reference a variable or function
                }
              }]
            });
          },
          // Finalize the transaction after payer approval
          onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              if(transaction.status == 'COMPLETED'){
                Livewire.emit('transactionEmit',transaction.id);
              }

              //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
             

            });
          }
        }).render('#paypal-button-container');
      </script>

@endpush
