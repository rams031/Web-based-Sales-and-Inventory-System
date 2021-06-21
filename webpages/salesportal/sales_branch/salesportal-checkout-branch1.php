 
    <div class="row">
        <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
        <div class="columns" style="padding:20px">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Choose Customer</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="customerid" id="customerid" required>
                                <option value="" disabled selected>Choose Customer</option>
                                <?php while ($row = mysqli_fetch_assoc($customer_data)) { ?>
                                <option value="<?php echo $row["customerid"] ?>"> <p  style="text-transform: capitalize;" > (<?php echo $row["customername"]; ?>) <?php echo $row["dateadded"]; ?> <p> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="column is-6">
                <div class="field">
                    <label class="label">Date</label>
                    <div class="control">
                        <input name="datecheckout" id="datecheckout"  class="input" type="date" placeholder="Date" min="0" required>
                    </div>
                </div>
            </div>                          
        </div>
    </div>
    
    <div class="row">
        <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
        <div class="columns" style="background-color:#FAFAFA; padding:20px; border-radius:8px;">
            <div class="column is-3">
              <div class="field">
                  <label class="label">Product</label>
                  <div class="control">
                      <div class="select is-fullwidth">
                          <select name="productcheckout" id="productcheckout">
                              <option value="" disabled selected>Choose Product</option>
                              <?php while ($row = mysqli_fetch_assoc($inventory_data)) { ?>
                              <option value="<?php echo $row["inventoryid"] ?>"> <p  style="text-transform: capitalize;" > (<?php echo $row["productname"]; ?>) <?php echo $row["productname"]; ?> <p> </option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
              </div>
            </div>
            <div class="column is-2">
                <div class="field">
                    <label class="label">Stock Available</label>
                    <div class="control">
                        <input name="stockcheckout" id="stockcheckout" disabled="disabled" class="input" type="number" placeholder="In-stock" required>
                    </div>
                </div>
            </div>
            <div class="column is-2">
                <div class="field">
                    <label class="label">Quantity</label>
                    <div class="control">
                        <input name="quantitycheckout" id="quantitycheckout" disabled="disabled" class="input" type="number" placeholder="Quantity" min="0" required>
                    </div>
                    <p id="existing" class="help is-danger">Quantity Exceeded</p>
                </div>
            </div>
            <div class="column is-2">
                <div class="field">
                    <label class="label">Price</label>
                    <div class="control">
                        <input name="pricecheckout" id="pricecheckout" class="input" type="number" min=0 placeholder="Price" disabled>
                    </div>
                </div>
            </div>
            <div class="column is-2">
                <div class="field">
                    <label class="label">Total Amount</label>
                    <div class="control">
                        <input name="totalamountcheckout" id="totalamountcheckout" class="input" type="number" min=0 placeholder="Price" disabled>
                    </div>
                </div>
            </div>
            <div class="column is-2">
                <div class="field">
                    <label class="label">Option</label>
                    <div class="control">
                        <a id="addcheckout" name="addcheckout" class="button is-info is-hovered">Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns" style="background-color:#FAFAFA; padding:20px; border-radius:8px;">
            <div class="column is-11">
                <table id="checkouttable" class="checkouttable table" cellspacing="0" width="100%" style=padding:10px; >
                    <thead>
                        <tr>
                            <th>Inventory ID</th>
                            <th>Product Name</th>
                            <th>Order Quantity</th>
                            <th>Order Price</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>    
            </div>
        </div>
    </div>


    