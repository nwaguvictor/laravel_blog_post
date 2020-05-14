<div class="container">
    {{-- Search section --}}
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

    {{-- Categories --}}
    <div class="my-5 p-3 shadow border rounded">
        <h5 class="border-bottom">Categories</h5>
        @if (count($categories) > 0)
            <ul class="category-list">
                @foreach ($categories as $category)
                    <li class="category-item">
                        <a class="category-link" href="">
                            <i class="fa fa-angle-double-right fa-fw"></i>{{$category->name}}
                        </a>
                    </li>
                @endforeach
                <li class="category-item">
                    <a class="category-link" href="">
                        <i class="fa fa-angle-double-right fa-fw"></i>Others
                    </a>
                </li>
            </ul>
        @endif
        
    </div>

    {{-- Contact us form --}}
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