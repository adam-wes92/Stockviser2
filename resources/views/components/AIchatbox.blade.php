<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="csrf-token" content="{{ csrf_token()}}">
    </head>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        ::-webkit-scrollbar{
            width: 5px;
        }
        ::-webkit-scrollbar-track{
            background: #13254c;
        }
        ::-webkit-scrollbar-thumb{
            background: #061128;
        }

        #chatOpen {
        transition: width 0.5s ease-in-out; /* Add transition property */
        }

        @media (max-width: 768px) { /* Adjust the breakpoint as needed */
        #chatOpen {
            width: 80%; /* Adjust the width for smaller screens */
            height: 20vh; /* Adjust the height for smaller screens */
            font-size: 14px; /* Adjust the font size for smaller screens */
        }
    }

    </style>
<body style="background: #05113b;">
    <div>
        <div id="chatOpen" class="container-fluid p-2" style="position: fixed; bottom: 37.8vh; right: 0; width: 40vh; height: 4vh; background-color: rgba(57, 192, 237, 0.8); overflow-y: scroll; border-radius: 15px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="margin-right: 5px;">
                    <!-- Add an ID to the arrow down icon for click event -->
                    <i id="toggleChat" class="fa fa-angle-down text-white"></i>
                </div>
                <div style="margin-left: 10px;">
                    <span id="chatLabel" class="text-white">Open Chat</span>
                </div>
            </div>
        </div>
        <div id="chatContent" class="container-fluid p-2" style="position: fixed; bottom: 7.598vh; right: 0; width: 40vh; height: 30vh; background-color: rgba(19, 31, 69, 0.8); overflow-y: scroll; border-radius: 15px;">
            <div style="display: block;">
                <div style="display: flex; align-items: center;">
                    <div style="width: 50px; height: 50px; margin-right: 10px;">
                        <img src="images/logo.png" width="100%" height="100%" style="border-radius: 50px;">
                    </div>
                    <div class="text-white font-weight-bold">
                        StockViser AI Assistant
                    </div>
                </div>

                <div id="content-box" class="container-fluid p-2" style="height: clac(100vh - 130px); overflow-y: scroll">
                    
                </div>
                <div class="container-fluid w-100 px-3 py-2 d-flex" style="height: 62px;">
                    <div class="mr-2 pl-2" style="background: #ffffff1c;width: calc(100% - 45px);border-radius:5px">
                        <input id="input" class="text-white" type="text" name="input" style="background: none;width: 100%;height: 100%;border: 0;outline: none;">
                    </div>
                    <div id="button-submit" class="text-center" style="background: #4acfee;height: 100%;width:50px;border-radius: 5px;">
                        <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height: 45px;"></i>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>
{{-- Jquery Ajax --}}
{{-- Jquery Ajax --}}
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Initial state: chatbox is visible
        let isChatboxVisible = true;

        // Toggle chatbox visibility on arrow down icon click
        $('#chatOpen').click(function() {
            const chatboxContent = $('#chatContent');
            const chatLabel = $('#chatLabel');
            const chatbox = $('#chatOpen');
            const chatboxText = $('#chatLabel')
            
            if (isChatboxVisible) {
                chatboxContent.hide();
                chatLabel.text('Open Chat');
                chatbox.css({
                    width: '12vh', // Adjust to your desired collapsed width
                    bottom: '7.598vh',
                });
                chatboxText.css({
                    fontSize: '11px', // Adjust to your desired collapsed width
                });
            } else {
                chatboxContent.show();
                chatLabel.text('Hide Chat');
                chatbox.css({
                    width: '40vh', // Set original width when expanded
                    bottom: '37.8vh',
                });
                chatboxText.css({
                    fontSize: '15px', // Adjust to your desired collapsed width
                });
            }
            isChatboxVisible = !isChatboxVisible;
        });
    });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    // Add a default greeting message when the page loads
    $(document).ready(function() {
        $('#content-box').append(`
            <div class="d-flex mb-2">
                <div class="mr-2" style="width: 45px; height: 45px;">
                    <img src="images/Avatar.png" width="100%" height="100%" style="border-radius: 50px;">
                </div>
                <div class="text-white px-3 py-2" style="width: 270px;background: #13254b;border-radius: 10px;font-size: 85%;">
                    Hello {{ auth()->user()->first_name }}, how can I help you?
                </div>
            </div>`);
    });

    $('#button-submit').on('click', function(){
        $value = $('#input').val();
        $('#content-box').append(`
            <div class="mb-2">
                <div class="float-right px-3 py-2" style="width: 270px;background: #4acfee;border-radius:10px;float: right;font-size:85%;">
                    `+$value+`
                </div>
                <div style="clear: both;"></div>
            </div>`);
            
            $.ajax({
                type: 'post',
                url: '{{url('send')}}',
                data: {
                    'input': $value
                },
                success: function(data) {
                    $('#content-box').append(`<div class="d-flex mb-2">
                    <div class="mr-2" style="width: 45px; height: 45px;">
                        <img src="images/Avatar.png" width="100%" height="100%" style="border-radius: 50px;">
                    </div>
                    <div class="text-white px-3 py-2" style="width: 270px;background: #13254b;border-radius: 10px;font-size: 85%;">
                       `+data+`
                    </div>
                </div>`)
                $value = $('#input').val('');
                }
            })
    });

</script>