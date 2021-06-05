
    <div class="row">
        <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
        <div class="columns">
            <div class="column is-6">
            <div class="field">
                  <label class="label">Customer</label>
                    <div class="control">
                        <input name="instockcheckout" id="instockcheckout" class="input" type="text" placeholder="Customer Name" required>
                    </div>
              </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Date</label>
                    <div class="control">
                        <input name="checkoutdate" id="checkoutdate" class="input" type="date" placeholder="Customer Name" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns" style="background-color:#FAFAFA; padding:20px; border-radius:8px;">
            <div class="column is-3">
              <div class="field">
                  <label class="label">Product</label>
                  <div class="control">
                      <div class="select is-fullwidth">
                          <select name="productcheckout" id="productcheckout" required>
                              <option value="" disabled selected>Choose Product</option>
                              <?php while ($row = mysqli_fetch_assoc($data)) { ?>
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
                <table id="checkouttable" class="checkouttable" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
              </table>    
            </div>
        </div>
    </div>


    