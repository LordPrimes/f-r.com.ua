@extends('site.layouts.index')
@section('pageSeo')
  
@endsection
@section('pageTitle')
@endsection
@section('content')


        <div class="d-flex flex-row justify-content-start filter ">
          <div class="filter-container">
              <form class="filter-form-control">
                <a>Цвет:</a>
               <label class="d-flex align-items-center"> <input type="checkbox">Красный</label>
                <label class="d-flex align-items-center"><input type="checkbox">черный</label>
                <label class="d-flex align-items-center"><input type="checkbox">белый</label>
                <label class="d-flex align-items-center"><input type="checkbox">что-то</label>
               
                
              </form>
           
           
            
             
           
        
          </div>
        </div>
       
        <div class="container">
            <div class="sort-search d-flex flex-row justify-content-around   ">
                <span>Сортировка:</span>
               
                  <a  href="{{ route($pagesname, ['sort' => 'price_asc']) }}">от дорогих</a>
                   
                  <a  href="{{ route($pagesname, ['sort' => 'price_desc']) }}">от дешевых</a>
                  @isset($product)
                      
                  
                  <a  href="{{ route($pagesname, ['sort' => 'A_Z']) }}">от (А-Я)</a>
                  <a  href="{{ route($pagesname, ['sort' => 'Z_A']) }}">от (Я-А)</a>
                @endisset 
            </div>
        @isset($product)
            
       
        <div class="event-blog">
        
                @foreach ($product as $item) 
               
                <div class="event-prod col-lg-3">
                        
                        <div class="card card-cascade narrower card-ecommerce">
                   
                          <div class="view view-cascade overlay">
                            <img src="/storage/app/public/{{$item->images}}" class="card-img-top"
                          alt="{{$item->alt_images}}" title="{{$item->title_images}}">
                            <a>
                              <div class="mask rgba-white-slight"></div>
                            </a>
                          </div>
                        
                          
                          <div class="event-mini-body card-body card-body-cascade text-center">
                          
                          <a href="{{$item->seo_title}}" class="grey-text">
                            <h5>{{$item->name}}</h5>
                            </a>
                         
                        
                        
                            <p class="card-text">{{$item->mini_description}}
                            </p>
                      
                            <div class="card-footer px-1">
                              <span class="float-left font-weight-bold">
                              <strong>{{$item->price}} ГРН</strong>
                              </span>
                              <span class="float-right">
                                <a href="" class="btn-sm  btn-rounded btn-light-green">
                                  Купить
                                </a>
                               
                               
                              </span>
                            </div>
                          </div>
                        
                        </div>
                       
                      </div>
              
                    
           
          @endforeach
          
        </div>
        <div class="paginate d-flex justify-content-center">
            {{ $product->links() }}
            </div>
            @endisset 
            @isset($action)
            <div class="event-blog">
            @foreach ($action as $item) 
               
            <div class="event-prod col-lg-3">
                    
                    <div class="card card-cascade narrower card-ecommerce">
               
                      <div class="view view-cascade overlay">
                        <img src="/storage/app/public/{{$item->actions->images}}" class="card-img-top"
                      alt="{{$item->actions->alt_images}}" title="{{$item->actions->title_images}}">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                    
                      
                      <div class="event-mini-body card-body card-body-cascade text-center">
                      
                      <a href="{{$item->actions->seo_title}}" class="grey-text">
                        <h5>{{$item->actions->name}}</h5>
                        </a>
                     
                    
                    
                        <p class="card-text">{{$item->actions->mini_description}}
                        </p>
                  
                        <div class="action-event-price card-footer px-1">
                          <span class="font-weight-bold">
                              <strong ><p>Старая цена:</p>{{$item->actions->price }}</strong>
                              <strong class="text-danger"><p>Новая цена:</p>{{$item->new_price }}</strong>
                          
                          </span>
                          <span>
                            <a href="" class="btn-sm  btn-rounded btn-light-green">
                              Купить
                            </a>
                           
                           
                          </span>
                        </div>
                      </div>
                    
                    </div>
                   
                  </div>
          
                
       
      @endforeach
      
    </div>
    <div class="paginate d-flex justify-content-center">
        {{ $action->links() }}
        </div>
            @endisset
         </div>     
        </div>
@endsection