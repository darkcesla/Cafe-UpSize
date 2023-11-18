<x-web-layout title="Register">
    <div class="bread-crumb">
        <img src="{{ asset('assets/images/banner_top.jpg') }}" class="img-responsive" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <h2>Registrasi</h2>
                <ul class="list-inline">
                    <li><a href="{{ (url('/')) }}">Beranda</a></li>
                    <li><a href="#">Registrasi</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-5 padd0">
                        <div class="leftside"></div>
                        <div class="loginto">
                            <div class="commontop text-center">
                                <h4>Registrasi</h4>
                                <hr>
                            </div>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <p>Sudah Memiliki Akun? Silahkan Untuk <a href="{{ url('/auth') }}">Masuk Sekarang</a>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                        </div>
                    </div>    
                    <div class="col-sm-7 padd0">
                        <div class="loginnow" style="display: flex; justify-content: center;">
                          <form action="{{ url('auth/register') }}" method="POST" enctype="multipart/form-data" style="width: 100%; max-width: 500px; margin: auto;">
                            @csrf
                            @error('namalengkap')
                              <div class="invalid-feedback" style="color: red;">
                                  Silahkan Isi Nama Lengkap Anda Terlebih Dahulu.
                              </div>
                            @enderror
                            <div class="form-group">
                              <i class="icofont icofont-ui-user"></i>
                              <input name="namalengkap" value="{{ old('namalengkap') }}" placeholder="Nama Lengkap" id="input-namalengkap" class="form-control" autocomplete="off" type="text" />
                            </div>
                            @error('username')
                              <div class="invalid-feedback" style="color: red;">
                                Silahkan Isi Username Anda Terlebih Dahulu.
                              </div>
                            @enderror
                            <div class="form-group">
                              <i class="icofont icofont-ui-user"></i>
                              <input name="username" value="{{ old('username') }}" placeholder="Username" id="input-username" class="form-control" autocomplete="off" type="text" />
                            </div>
                            @error('nomorhp')
                            <div class="invalid-feedback" style="color: red;">
                                Silahkan Isi Nomor Handphone Anda Terlebih Dahulu.
                              </div>
                            @enderror
                            <div class="form-group">
                              <i class="icofont icofont-phone"></i>
                              <input name="nomorhp" value="{{ old('nomorhp') }}" placeholder="NomorHp" id="input-nomorhp" class="form-control" autocomplete="off" type="text" />
                            </div>
                            @error('email')
                            <div class="invalid-feedback" style="color: red;">
                                Silahkan Isi Email Anda Terlebih Dahulu.
                              </div>
                            @enderror
                            <div class="form-group">
                              <i class="icofont icofont-ui-message"></i>
                              <input name="email" value="{{ old('email') }}" placeholder="Email" id="input-email" class="form-control" autocomplete="off" type="text" />
                            </div>
                            @error('password')
                            <div class="invalid-feedback" style="color: red;">
                                Silahkan Isi Password Anda Terlebih Dahulu.
                              </div>
                            @enderror
                            <div class="form-group">
                              <i class="icofont icofont-lock"></i>
                              <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" autocomplete="new-password" />
                            </div>
                            <div style="position: relative; top: -20px; text-align: center;">
                              <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Register</button>
                            </div>
                          </form>
                        </div>
                      </div>              
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
