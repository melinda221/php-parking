"use strict";

class EWallet {
  constructor(items = [], customer) {
    this.items = items;
    this.customer = customer;
  }

  baseBody() {
    let gross_amount = 0;
    let order_id = new Date().getTime();

    let items = this.items;
    let customer = this.customer;

    items.forEach(function (item, index) {
      gross_amount += item.price * item.quantity;
    });

    let body = {
      payment_type: "qris",
      transaction_details: {
        gross_amount: gross_amount,
        order_id: order_id,
      },
      customer_details: {
        email: customer.email,
        first_name: customer.first_name,
        last_name: customer.last_name,
        phone: customer.phone,
      },

      item_details: this.items,
    };
    return body;
  }

  goPay() {
    let base = this.baseBody();
    let mybody = {
      payment_type: base.payment_type,
      transaction_details: base.transaction_details,
      customer_details: base.customer_details,
      item_details: base.item_details,
      qris: {
        enable_callback: true,
        callback_url: "gojEk://callback",
      },
    };
    return mybody;
  }
}

module.exports = EWallet;
