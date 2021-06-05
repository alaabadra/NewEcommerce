<template>
  <div>
    <v-snackbar v-model="snackbar" :color="color">
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>

    <v-combobox
      class="col-sm-5 ml-auto"
      dense
      outlined
      :items="couponcodes_names"
      label="coubon"
      v-model="editedItem.couponcode"
    ></v-combobox>
    <v-text-field
      class="col-sm-5 mr-auto"
      outlined
      dense
      label="payment method"
      v-model="editedItem.payment_method"
    >
    </v-text-field>
    <v-text-field
      class="col-sm-5 mr-auto"
      outlined
      dense
      label="number card"
      type="number"
      v-model="editedItem.number_card"
    >
    </v-text-field>
    <div>
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
            @click="placeOrder()"
          >
            <v-icon>mdi-reply-all</v-icon>
          </v-btn>
        </template>
        <span>place order</span>
      </v-tooltip>
    </div>
    <div>
      your order info:
      {{ orderInfo }}
    </div>
  </div>
</template>
<script>
import navigate from "../../components/nav";
import axios from "axios";

export default {
  name: "order",
  components: {
    navigate,
  },
  data() {
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
      couponcodes: [],
      couponcodes_names: [],
      order: {
        id: 1,
        status: "",
      },
      editedItem: {
        couponcode: null,
        coupon_code: null,
        couponcode_id: null,
        payment_method: null,
        number_card: null,
      },
    };
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
            this.editedItem.coupon_code = couponcode.coupon_code;
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
    placeOrder() {
      setTimeout(() => {
        axios
          .post(`http://127.0.0.1:8000/api/user/orders/place-order`, {
            coupon_code: this.editedItem.coupon_code,
            payment_method: this.editedItem.payment_method,
            number_card: this.editedItem.number_card,
          })
          .then((res) => {
            if (res.data.status == 404) {
              this.noDataInSomethingResult();
            } else if (res.data.status == 401) {
              this.callErrorMessage(res.data.status);
            } else if (res.data.status == 400) {
              this.callErrorMessage(res.data.status);
            } else {
              if (res.data.length != 0) {
                this.callSuccessMessage(res.data.data);
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
      }, 500);
    },
    initialize() {
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
  },
};
</script>
