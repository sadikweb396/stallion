@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Logo</h3>
        </div>
        <div class="stallions_search">
        </div>
      </div>
      <div class="stallions_tabs_main">
        <div class="tabs_i">
          <div class="">
            <div class="main_tab_content">
              <div class="main_stallions_d">
                <div class="title_bar mb20">
                  <p class="text-center">Logo</p>
                </div>
                <div class="stallions_d_form mb50">
                  <form method="post" action="{{ route('admin.logo.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form_main">
                      <div class="form-group">
                        <label for="headerLogo">Header Logo</label>
                        <input type="file" name="header_logo" id="headerLogo" onchange="previewImage(event, 'headerImagePreview')">
                        <img id="headerImagePreview" src="@if($logo){{ url($logo->logo) }}@endif" style="max-width: 300px;">
                      </div>
                    </div>

                    <div class="form_main">
                      <div class="form-group">
                        <label for="footerLogo">Footer Logo</label>
                        <input type="file" name="footer_logo" id="footerLogo" onchange="previewImage(event, 'footerImagePreview')">
                        <img id="footerImagePreview" src="@if($logo){{ url($logo->footerlogo) }}@endif" style="max-width: 300px;">
                      </div>
                    </div>
                    
                    <div class="update_btn text-right mb50">
                      <button type="submit" class="btn btn_i black_btn">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')

@endpush
@endsection


