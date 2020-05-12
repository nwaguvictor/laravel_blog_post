<div class="container">
    <div class="p-3 shadow border rounded">

        <form action="" method="POST">
            <h5>Search</h5>
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" 
                    name="search" placeholder="search..."
                >
                <div class="input-group-append">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    
    <div class="my-5 p-3 shadow border rounded">
        <h5>Contact Us</h5>
        <form action="" method="POST" class="form">
            <div class="form-group">
                <input type="text" name="name" class="form-control" 
                    placeholder="Your Name"
                    value="{{old('name')}}"
                >
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" 
                    placeholder="Your E-mail"
                    value="{{old('email')}}"
                >
            </div>

            <div class="form-group">
                <textarea name="message" id="" 
                    cols="30" rows="6"
                    class="form-control"
                    placeholder="Your Message"
                >{{old('message')}}</textarea>
            </div>

            <button type="submit" class="btn btn-success form-control">Contact Us</button>
        </form>
    </div>
</div>