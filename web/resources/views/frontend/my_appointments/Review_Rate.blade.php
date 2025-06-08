@extends('frontend.layout')
@section('content') 
   <section class="sec-padding">
      <div class="container">
        <div class="services-in-box m-auto">
          <div class="categories-services services-manage-box">
            <div class="Cleaning-in-text">
             <figure><img src="images/portrait-happy.jpg"></figure>
                <div class="service-in-page d-flex justify-content-between">
                  <h5>Cleaning services</h5>
                </div>
              </div>
           <figcaption>
             <h6>Description</h6>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

              <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>

            <div class="d-flex">
                <a class="nav-link  btn btn-yellow"  type="button" data-toggle="modal" data-target="#exampleModalCenter" href="#">
                   Request Service
                </a>
            </div>
            <!-- Modal -->
            <div class="service-modal-box">
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Rate and Review</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="Provided-imgs"><figure><img src="images/user-1.jpg"></figure></div>
                        <div class="Provided-text-in">
                           <h4>Jhone Smith</h4>
                           <span>3.5</span>
                        </div>
                        <div class="Review-star">
                          <a href="#"><span><i class="fas fa-star"></i></span></a>
                          <a href="#"><span><i class="fas fa-star"></i></span></a>
                          <a href="#"><span><i class="fas fa-star"></i></span></a>
                          <a href="#" class="unfill"><span><i class="fas fa-star"></i></span></a>
                          <a href="#" class="unfill"><span><i class="fas fa-star"></i></span></a>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                             <textarea class="form-control" placeholder="Write your review..."></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="Creat-button-modal">
                        <button class="nav-link btn  btn-green" href="#">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </figcaption>
        </div>
      </div>
    </div>
  </section>
@endsection