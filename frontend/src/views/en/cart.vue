<template>
  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
      <v-snackbar v-model="snackbar" :color="color">
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>
  <div class="humberger__menu__overlay"></div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="shoping__cart__table w-100 row p-0">
            <table class="col-sm-12 mx-auto">
              <thead>
                <tr>
                  <th class="shoping__product"  colspan="5">Products</th>
                  <th colspan="2">Price</th>
                  <th colspan="2">Quantity</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="product in productsCart" :key="product.id">
                  <td class="shoping__cart__item" colspan="5">
                    <img src="img/cart/cart-1.jpg" alt="" />
                    <h5>{{ product.product_attr_name }}</h5>

                  </td>
                  <td class="shoping__cart__price" colspan="2">
                    {{ product.product_attr_price }}
                  </td>
                  <td class="shoping__cart__quantity" colspan="2">
                    <div class="quantity">
                      <div class="pro-qty">
                                          <td class="shoping__cart__quantity" colspan="2">
                    {{ product.pivot.product_attr_quantity }}
                  </td>
                      </div>
                    </div>
                  </td>
                  <td class="shoping__cart__total">
                    {{
                      product.pivot.product_attr_total
                    }}
                  </td>
                  <td class="shoping__cart__total">
                    <v-btn icon small @click="increaseQuantityItem(product)">
                      <i class="fas fa-edit"></i>
                    </v-btn>
                  </td>
                  <td class="shoping__cart__total" colspan="2">
                    <v-btn icon small @click="decreaseQuantityItem(product)">
                      <i class="fas fa-edit"></i>
                    </v-btn>
                  </td>
                  <td class="shoping__cart__total">
                    <v-btn icon small @click="deleteItem(product)">
                      <i class="fas fa-edit"></i>
                    </v-btn>
                  </td>

                  <td class="shoping__cart__item__close">
                    <span class="icon_close"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="shoping__cart__btns">
            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
            <a href="#" class="primary-btn cart-btn cart-btn-right"
              ><span class="icon_loading"></span> Upadate Cart</a
            >
          </div>
        </div>
        <div class="col-lg-6">
          <div class="shoping__continue">
            <div class="shoping__discount">
              <h5>Discount Codes</h5>
              <form action="#">
                <input type="text" placeholder="Enter your coupon code" />
                <v-combobox
                  class="col-sm-5 ml-auto"
                  dense
                  outlined
                  :items="couponcodes_names"
                  label="coubon"
                  v-model="editedItem.couponcode"
                  clearable=""
                ></v-combobox>

              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="shoping__checkout">
            <h5>Cart Total</h5>
            <ul>
              <li>Subtotal <span>${{subTotal}}</span></li>
              <li>Total <span>${{total}}</span></li>
            </ul>
            <router-link to="/order">
              <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <v-dialog v-model="decDialog" width="600">
      <v-card>
        <v-card-title> enter your qty to decrease into your cart</v-card-title>
        <div class="row">
          <v-text-field
            class="col-sm-5 mr-auto"
            outlined
            dense
            label="كمية المنتج"
            type="number"
            v-model="editedItem.qty"
          >
          </v-text-field>

          <div class="col-sm-9 mx-auto"></div>
          <div class="col-sm-5 mx-auto row">
            <v-tooltip top>
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  fab
                  v-bind="attrs"
                  v-on="on"
                  size="24"
                  class="mx-auto"
                  color="blue darken-3"
                  dark
                  @click="decreaseQuantityItemInput()"
                >
                  <v-icon>mdi-content-save-all</v-icon>
                </v-btn>
              </template>
              <span>حفظ</span>
            </v-tooltip>
            <v-tooltip top>
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  fab
                  v-bind="attrs"
                  v-on="on"
                  size="24"
                  class="mx-auto"
                  color="amber darken-3"
                  dark
                  @click="closedecDialog()"
                >
                  <v-icon>mdi-reply-all</v-icon>
                </v-btn>
              </template>
              <span>رجوع</span>
            </v-tooltip>
          </div>
        </div>

      </v-card>
    </v-dialog>
    <v-dialog v-model="incDialog" width="600">
      <v-card>
        <v-card-title> enter your qty to increase into your cart</v-card-title>
        <div class="row">
          <v-text-field
            class="col-sm-5 mr-auto"
            outlined
            dense
            label="كمية المنتج"
            type="number"
            v-model="editedItem.qty"
          >
          </v-text-field>

          <div class="col-sm-9 mx-auto"></div>
          <div class="col-sm-5 mx-auto row">
            <v-tooltip top>
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  fab
                  v-bind="attrs"
                  v-on="on"
                  size="24"
                  class="mx-auto"
                  color="blue darken-3"
                  dark
                  @click="increaseQuantityItemInput()"
                >
                  <v-icon>mdi-content-save-all</v-icon>
                </v-btn>
              </template>
              <span>حفظ</span>
            </v-tooltip>
           
          </div>
        </div>
        <v-tooltip top>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              fab
              v-bind="attrs"
              v-on="on"
              size="24"
              class="mx-auto"
              color="amber darken-3"
              dark
              @click="closeincDialog()"
            >
              <v-icon>mdi-reply-all</v-icon>
            </v-btn>
          </template>
          <span>رجوع</span>
        </v-tooltip>
      </v-card>
    </v-dialog>
    
  </section>
  <!-- Shoping Cart Section End -->
</template>
<script>
import navigate from "../../components/nav";
import axios from "axios";
import "../../assets/css/bootstrap.min.css";
import "../../assets/css/font-awesome.min.css";
import "../../assets/css/elegant-icons.css";
import "../../assets/css/nice-select.css";
import "../../assets/css/slicknav.min.css";
import "../../assets/css/style.css"; 
export default {
  name: "cart",
  components: {
    navigate,
  },
  data: () => {
    return {
snackbar: false,
      text: null,
      color: null,
      ErrorBool: false,
      SuccessBool: false,
      Errors: [],
      Success: [],
      ErrorMessage: {
        "500": "Occured Error in server side to show Result Data ! Try again",
        "404": "Somthing Not Found In Result Data ! Try again",
        "400": "You Can not make this , try again in your entering ",
        "401": "You UnAuthorized to see Result Data ! Login ,pls",
        "405": "Somthing Not Allow to show Result Data ! Try again",
        "419": "Somthing Unknown In Result Data ! Try again",
        "No Data In Your Entering":
          "There is No Data in Your DataBase to show it",
        "No Data To Show It":
          "There is No Data in Something in Show The Result",
        "No Data Tasks": "There is No Tasks For This User to  Show it",
        "No Data Events": "There is No Event For This User to  Show it",
        Else: "Occured Somthing Error  to show Result Data ! Try again",
      },
      incDialog: false,
      decDialog: false,
      overlay: false,
      subTotal:null,
      total:null,
      viewProductsCouponcode: [],
      couponcodes: [],
      couponcodes_names: [],
      productsCart: [],
      search: "",
      dialog: false,
      delDialog: false,

      products_cart: [],
      editedIndex: -1,
      editedItem: {
        couponcode: "",
        couponcode_id: null,
        idProd: null,
        qty: null,
        total: null,
      },
      defaultItem: {
        couponcode: "",
        couponcode_id: null,
        idProd: null,
        qty: null,
        total: null,
      },
      cuponValue: 0,
    };
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },
  watch: {
        Errors(val) {
      this.snackbar = true;
      this.color = "red darken-1";
      val.forEach((item) => {
        this.text = this.getError(item);
      });
    },
    Success(val) {
      this.snackbar = true;
      this.color = "green darken-1";
      val.forEach((item) => {
        this.text = this.getError(item);
      });
    },
    dialog(val) {
      val || this.close();
    },
    "editedItem.couponcode": {
      handler: function(val, before) {

        this.couponcodes.forEach((couponcode) => {
          if (val.value == couponcode.id) {
            this.editedItem.couponcode_id = couponcode.id;
            setTimeout(() => {
              this.applyCoupon();
            }, 350);
          }
        });
      },
      deep: true,
    },
  },
  created() {
    this.initialize();
  },
  methods: {
        getError(id) {
      if (this.ErrorMessage.hasOwnProperty(id)) return this.ErrorMessage[id];
    },
    callSuccessMessage(msg) {
      this.Success = [];
      return this.Success.push(msg);
    },
    noDataInYourEntering() {
      this.Errors = [];
      (this.ErrorBool = true),
        this.Errors.push("No Data In Your Entering"),
        () =>
          setTimeout(() => {
            this.ErrorBool = false;
          }, 3000);
    },
    noDataInSomethingResult() {
      this.Errors = [];
      (this.ErrorBool = true),
        this.Errors.push("No Data To Show It"),
        () =>
          setTimeout(() => {
            this.ErrorBool = false;
          }, 3000);
    },
    callErrorMessage(statusErr) {
      if (
        statusErr == 404 ||
        statusErr == 401 ||
        statusErr == 500 ||
        statusErr == 419 ||
        statusErr == 400 ||
        statusErr == 405
      ) {
        this.Errors = [];
        this.Errors.push(statusErr);
      } else {
        this.Errors = [];
        this.Errors.push("Else");
      }
    },
    increaseQuantityItem(item) {
      this.overlay = true;
      this.incDialog = true;
      this.editedItem.idProd = item.id;
    },
    increaseQuantityItemInput() {
      axios
        .post(
          `http://127.0.0.1:8000/api/user/carts/update-cart-user-increase-quantity-prod/${this.editedItem.idProd}`,
          {
            quantityProductInCartUser: this.editedItem.qty,
          }
        )
                .then((res) => {

          if (res.data.status == 404) {
            this.noDataInSomethingResult();
          } else if (res.data.status == 401) {
            this.callErrorMessage(res.data.status);
          } else if (res.data.status == 400) {
            this.callErrorMessage(res.data.status);
          } else {
            if (res.data.length != 0) {
                this.callSuccessMessage(res.data.message);

      
            } else {
              this.noDataInYourEntering();
            }
          }
        })
        .catch((err) => {
          if (err.response) {
            this.callErrorMessage(err.response.status);
          } else {
            this.callErrorMessage("Else");
          }
        });
    },
    closeincDialog() {
      this.editedIndex = -1;
      this.incDialog = false;
      this.overlay = false;
    },
    decreaseQuantityItem(item) {
      this.overlay = true;
      this.decDialog = true;
      this.editedItem.idProd = item.id;
    },
    decreaseQuantityItemInput() {
      axios
        .post(
          `http://127.0.0.1:8000/api/user/carts/update-cart-user-decrease-quantity-prod/${this.editedItem.idProd}`,
          {
            quantityProductInCartUser: this.editedItem.qty,
          }
        )


                .then((res) => {

          if (res.data.status == 404) {
            this.noDataInSomethingResult();
          } else if (res.data.status == 401) {
            this.callErrorMessage(res.data.status);
          } else if (res.data.status == 400) {
            this.callErrorMessage(res.data.status);
          } else {
            if (res.data.length != 0) {
                this.callSuccessMessage(res.data.message);

      
            } else {
              this.noDataInYourEntering();
            }
          }
        })
        .catch((err) => {
          if (err.response) {
            this.callErrorMessage(err.response.status);
          } else {
            this.callErrorMessage("Else");
          }
        });
    },

    closedecDialog() {
      this.editedIndex = -1;
      this.decDialog = false;
      this.overlay = false;
    },
    applyCoupon() {
      axios
        .get(
          `http://127.0.0.1:8000/api/user/users/coupons/show-couponcode/${this.editedItem.couponcode_id}`
        )
        .then((res) => {
          this.cuponValue =res.data.data.coupon_code_amount
        });
      axios
        .get(
          `http://127.0.0.1:8000/api/user/users/coupons/apply-couponcodes-product/${this.editedItem.couponcode_id}`
        )
        .then((res) => {
          res.data.data.forEach((item) => { 
            this.productsCart.forEach((product) => {
              if (item.id == product.id) {
               let total = Number(product.pivot.product_attr_quantity) * 
               Number(product.product_attr_price);
               let cupVal= total * (this.cuponValue/100);
               let new_total = total - cupVal;
               let index = this.productsCart.indexOf(product)
               setTimeout(()=>{
                 this.productsCart[index].pivot.product_attr_total = new_total
               },350)
              }
            });

          });
        });
    },
    getColor(status) {
      if (status == "غير متوفرة" || status == "Not Available") return "red";
      else if (status == "متوفرة" || status == "Available") return "green";
    },

    initialize() {
      this.incDialog = false;
      this.decDialog = false;
        let total=0, subTotal=0,tax=2;
      axios
        .get(`http://127.0.0.1:8000/api/user/carts/get-user-cart`)
        .then((res) => {
          res.data.data.forEach((item) => {
            let total = {
              total: 0
            },
            mainItem = {};
            total.total = item.product_attr_price * item.product_attr_quantity;
            subTotal=subTotal+item.pivot.product_attr_total;
            this.subTotal=subTotal;
             mainItem = Object.assign({}, total, item)
            this.productsCart.push(mainItem);
          }); 
          this.subTotal=subTotal;
          this.total=total+(subTotal*tax);

        });
      axios
        .get(`http://127.0.0.1:8000/api/user/users/coupons/get-couponcodes`)
        .then((res) => {
          if (res.data.length != 0) {
            res.data.data.forEach((item) => {
              this.couponcodes.push(item);
              this.couponcodes_names.push({
                text: item.coupon_code,
                value: item.id,
              });
            });
          } else {
            this.noDataInYourEntering();
          }
        });

    },

    editItem(item) {
      this.editedIndex = this.products_cart.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      const index = this.products_cart.indexOf(item);
      confirm("هل أنت متأكدأنك تريح مسح هذا العنصر!") &&
        axios
          .post(
            `http://127.0.0.1:8000/api/user/carts/delete-product-from-user-cart/${item.id}`
          )

           .then((res) => {
          if (res.data.status == 404) {
            this.noDataInSomethingResult();
          } else if (res.data.status == 401) {
            this.callErrorMessage(res.data.status);
          } else if (res.data.status == 400) {
            this.callErrorMessage(res.data.status);
          } else {
            if (res.data.length != 0) {
                this.callSuccessMessage(res.data.message);

      
            } else {
              this.noDataInYourEntering();
            }
          }
        })
        .catch((err) => {
          if (err.response) {
            this.callErrorMessage(err.response.status);
          } else {
            this.callErrorMessage("Else");
          }
        });
      this.products_cart.splice(index, 1);
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.products_cart[this.editedIndex], this.editedItem);
      } else {
        this.products_cart.push(this.editedItem);
      }
      this.close();
    },
  },
};
</script>
<style></style>
