"use strict";

const CoreApi = require("../Midtrans/CoreApi");
const BankTransfer = require("./BankTransfer");
const EWallet = require("./EWallet");

class IndexController {
  async bankTransfer({ request, response }) {
    let data;
    let body = request.body;
    let customers = {
      email: "melindamareta@gmail.com",
      first_name: "Melinda",
      last_name: "Mareta",
      phone: "0893526773882",
    };
    var bankTransfer = new BankTransfer(body.items, customers);
    switch (body.channel) {
      case "BCA":
        data = bankTransfer.bca();
        break;
      case "BNI":
        data = bankTransfer.bni();
        break;
      case "PERMATA":
        data = bankTransfer.permata();
        break;
    }

    // return data
    return CoreApi.charge(data);
  }
  async goPay({ request, response}) {
    let data;
    let body = request.body;
    let customers = {
      email: "melindamareta@gmail.com",
      first_name: "Melinda",
      last_name: "Mareta",
      phone: "0893526773882",
    };

    var eWallet = new EWallet(body.items, customers);
    // console.log(body.items);
    data = eWallet.goPay();

    // return data;
    return CoreApi.charge(data);
  }



}

module.exports = IndexController;


