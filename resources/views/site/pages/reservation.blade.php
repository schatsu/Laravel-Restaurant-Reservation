@extends('site.layouts.app')
@section('title')
Rezervasyon
@endsection
@section('content')
    <section data-bs-version="5.1" class="form5 cid-tT8PHSZTKb" id="form02-q">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                    <strong>Rezervasyon</strong></h3>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="{{route('reservation.store')}}" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                        @csrf
                        <div class="row"></div>
                        <div class="dragArea row">
                            <div class="col-md-6 col-sm-12 form-group mb-3" data-for="name">
                                <input type="text" name="name" placeholder="Ad Soyad" data-form-field="name" class="form-control" value="{{old('name')}}" >
                            </div>
                            <div class="col-md-6 col-sm-12 form-group mb-3" data-for="email">
                                <input type="email" name="email" placeholder="E-Posta" data-form-field="email" class="form-control" value="{{old('email')}}" >
                            </div>
                            <div class="col-md-6 col-sm-12 form-group mb-3" data-for="phone">
                                <input type="tel" name="phone" placeholder="Telefon" data-form-field="phone" class="form-control" value="{{old('phone')}}">
                            </div>
                            <div class="col-md-6 col-sm-12 form-group mb-3" data-for="person">
                                <input type="number" name="person" placeholder="Kişi Sayısı" min="1" max="10" data-form-field="person" class="form-control" value="{{old('person')}}">
                            </div>
                            <div class="col-md-6 col-sm-12 form-group mb-3" data-for="person">
                                <input type="text" name="date" id="date" class="form-control" placeholder="Tarih seçiniz">
                            </div>
                            <div class="col-md-6 col-sm-12 form-group mb-3" data-for="person">
                                <select name="time" class="form-select" id="time" style="min-height: 66px !important;">
                                    <option value="{{null}}" selected>Saat</option>
                                    <option value="09:00:00">09.00</option>
                                    <option value="10:00:00">10.00</option>
                                    <option value="11:00:00">11.00</option>
                                    <option value="12:00:00">12.00</option>
                                    <option value="13:00:00">13.00</option>
                                    <option value="14:00:00">14.00</option>
                                    <option value="15:00:00">15.00</option>
                                    <option value="16:00:00">16.00</option>
                                    <option value="17:00:00">17.00</option>
                                    <option value="18:00:00">18.00</option>
                                    <option value="19:00:00">19.00</option>
                                    <option value="20:00:00">20.00</option>
                                    <option value="21:00:00">21.00</option>
                                    <option value="22:00:00">22.00</option>
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-12 form-group mb-3" data-for="textarea">
                                <textarea name="message" placeholder="Mesaj" data-form-field="textarea" class="form-control" id="textarea-form02-q"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                                <button type="submit" class="btn btn-primary display-7">Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {
            $("#date").datepicker({
                dateFormat: "yy-mm-dd", // İstenilen tarih formatı
                minDate: 0, // Bugünden itibaren tarih seçilebilir
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var timeInput = document.getElementById("time");

            timeInput.addEventListener("focus", function() {
                if (timeInput.value === "") {
                    timeInput.value = "Saat";
                }
            });

            timeInput.addEventListener("blur", function() {
                if (timeInput.value === "Saat") {
                    timeInput.value = "";
                }
            });
        });
    </script>
@endsection
