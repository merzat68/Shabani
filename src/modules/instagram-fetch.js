import axios from "axios";
import $ from "jquery";

class InstagramFetch {
  constructor() {
    this.InstagramFeed = document.querySelector("#instagram__container");
    this.fetchIG();
  }

  fetchIG() {
    $.ajax({
      url: "https://reeteshghimire.com.np/instagram-api/?user=mrezat",
      type: "get",
      success: function (response) {
        //respond = JSON.parse(response);
        console.log(response);
      },
    });
  }
}

export default InstagramFetch;
