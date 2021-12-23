<style>

    .rw-widget-container .rw-header{background-image: -webkit-linear-gradient(90deg, #eb5c70 0%, #ff5860 100%);}
    //.rw-widget-container .rw-header{background-image: -webkit-linear-gradient(90deg, #333 0%, #666 100%);}
    .rw-widget-container .rw-messages-container .rw-message .rw-client{background-color: blue 100%}
    .rw-launcher{background-image: -webkit-linear-gradient(90deg, #eb5c70 0%, #ff5860 100%);}

    //.rw-widget-container .rw-messages-container .rw-message .rw-response{background-image: -webkit-linear-gradient(90deg, #eb5c70 0%, #ff5860 100%);color:white}
    .rw-widget-container .rw-messages-container .rw-message .rw-response{background-image: -webkit-linear-gradient(90deg, #555 0%, #666 100%);color:white}
    .rw-widget-container .rw-sender{background-color: #333}
    .rw-widget-container .rw-sender .rw-new-message {background-color: #333;color:white}
    .rw-widget-container .rw-sender .rw-send {background-color: #333;color:white}
    .rw-widget-container .rw-messages-container{background-color: #333}

</style>
<script>!(function () {
    let e = document.createElement("script"),
      t = document.head || document.getElementsByTagName("head")[0];
    (e.src =
      "{{ asset('asset/js/chatbot.js') }}"),
      // Replace 1.x.x with the version that you want
      (e.async = !0),
      (e.onload = () => {
        window.WebChat.default(
          {
                initPayload:'/greet',
                customData: { language: "vi" },
                socketUrl: "http://localhost:5005",
                title:'Bé Bắp',
                subtitle:'Xin hãy hỏi bé nha !',

            // add other props here
          },
          null
        );
      }),
      t.insertBefore(e, t.firstChild);
  })();
  </script>
  {{--  https://cdn.jsdelivr.net/npm/rasa-webchat/lib/index.js  --}}
