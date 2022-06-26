"use strict";
Object.defineProperty(exports, "__esModule", { value: true });

const SANDBOX_BASE_URL = "https://api.sandbox.midtrans.com/v2";
const PRODUCTION_BASE_URL = "https://api.midtrans.com/v2";
const SNAP_SANDBOX_BASE_URL = "https://app.sandbox.midtrans.com/snap/v1";
const SNAP_PRODUCTION_BASE_URL = "https://app.midtrans.com/snap/v1";

class Config {
  static serverKey = "SB-Mid-server-xdhfufHMzWG5CwSUNYcwqN-B";
  static isProduction = false;
  static is3ds = false;
  static isSanitized = false;
  static curlOptions = [];

  static getBaseUrl() {
    return Config.isProduction ? PRODUCTION_BASE_URL : SANDBOX_BASE_URL;
  }
}

module.exports = Config;
