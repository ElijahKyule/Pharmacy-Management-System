
      <div class="row">
      <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                    <span class="fa-3x fas fa-capsules"></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">

                    <h4>Items</h4>
                    <h2><?= $this->Html->link($itemsTotal, ['controller'=>'Drugs', 'action' => 'index']) ?></h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                    <span class="fa-3x fas fa-user-friends"> </span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Clients</h4>
                    <h2><?= $this->Html->link($clientsTotal, ['controller'=>'Clients', 'action' => 'index']) ?></h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                    <span class="fa-3x fas fa-users"> </span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Suppliers</h4>
                    <h2><?= $this->Html->link($suppliersTotal,['controller'=>'Suppliers', 'action' => 'index']) ?></h2>
                </div>
              </div>
            </div>
        </div>
    </div>
    
    <div class="row">
      <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                    <span class="fa-3x fas fa-cart-arrow-down"></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Orders</h4>
                    <h2><?= $this->Html->link($ordersTotal, ['controller'=>'Orders', 'action' => 'index']) ?></h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                   <span class="fa-3x fas fa-clipboard-list"></span> 
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Stocks</h4>
                    
                    <h2><?= $this->Html->link($stocksTotal, ['controller'=>'Stocks', 'action' => 'index']) ?></h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                    <span class="fa-3x fas fa-user"></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Admins</h4>
                    <h2><?= $this->Html->link($adminsTotal, ['controller'=>'Administrators', 'action' => 'index']) ?></h2>
                </div>
              </div>
            </div>
        </div>

    </div> 