@extends('site.front.index')

@section('content')

    <main class="main md-top bg-light pt-5 pb-5">
        <div class="container main-content">


            <div class="row mt-5">
                <div class="col-md-6">
                    <div id="support">
                        @include('site.front.include.Info_block')
                    </div>
                    <h1>{{$item->title}}</h1>
                    <div class="content-post">
                        {!! $item->content !!}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-success mt-5">
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
            <div class="content-box green calculator-site-ash row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Выберите Валюту для расчета</label>
                        <select class="form-control ash_currency" id="exampleFormControlSelect1">
                            <option class="valuta_name" value="1" data-name="$">USA Доллар</option>
                            <option class="valuta_name" value="26" data-name="Грн">UA Гривна</option>
                            <option class="valuta_name" value="70" data-name="Руб">RU Рубль</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Выберите тип проекта который хотите получить</label>
                        <select class="form-control ash_pryce_site_start">
                            @foreach($filters as $filter)
                                <option class="" value="{{$filter->price_starting}}"
                                        data-title="{{$filter->title}}">{{$filter->title}}</option>

                            @endforeach
                        </select>
                    </div>
                    <small class="form-text text-muted">Отметьте если например хостинг или домен у Вас уже
                        есть, это снизит конечную стоимость проекта
                    </small>
                    <div class="form-check ash_pryce_domain">
                        <input type="hidden" class="order_domain" value=" {{__('site.free')}} {{__('site.order_domain')}}">
                        <input name="domain" class="form-check-input" type="checkbox" value="12">
                        <label class="form-check-label">{{__('site.check_one')}} {{__('site.check_domain')}}</label>
                    </div>
                    <div class="form-check ash_pryce_host">
                        <input type="hidden" class="order_host" value="{{__('site.free')}} {{__('site.order_host')}}">
                        <input name="host" value="12" class="form-check-input " type="checkbox">
                        <label class="form-check-label">{{__('site.check_one')}} {{__('site.check_host')}}</label>
                    </div>
                    <div class="form-group">
                        <label>Выберите подходящий для Вас вариант</label>
                        <select class="form-control details_project">
                            <option value="0" data-name="templ">Мне нужно делать дизайн сайт с нуля</option>
                            <option value="20"
                                    data-name="{{__('site.desing')}}">{{__('site.check_one')}} {{__('site.desing')}}</option>
                            <option value="30"
                                    data-name="{{__('site.layout')}}">{{__('site.check_one')}} {{__('site.layout')}}</option>
                            <option value="60"
                                    data-name="{{__('site.templ')}}">{{__('site.check_one')}} {{__('site.templ')}}</option>
                        </select>
                        <small class="form-text text-muted">По умалчиванию считается создание с нуля, но Вы
                            можете выбрать более бюджетный вариант
                        </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ash-dop-servis">
                        <small class="form-text text-muted">Дополнительные возможности для проекта, которые не входят в
                            базовый комплект:
                        </small>
                        <div class="form-check">
                            <input value="40" class="form-check-input" type="checkbox"
                                   data-name="Мультиязчный проект">
                            <label class="form-check-label" for="defaultCheck1">
                                Мультиязычный проект
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="20" class="form-check-input" type="checkbox" value="30"
                                   data-name="Микроразметка-важна для правильной индексации сайта">
                            <label class="form-check-label" for="defaultCheck1">
                                Микроразметка-важна для правильной индексации сайта
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="10" class="form-check-input" type="checkbox" value="20"
                                   data-name="Подключение сайта к кабинетам веб-мастеров поисковых систем, настройка статистики и целей для Директ">
                            <label class="form-check-label">
                                Подключение сайта к кабинетам веб-мастеров поисковых систем, настройка статистики и целей
                                для Директ
                            </label>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input value="100" class="form-check-input" type="checkbox"
                                       data-name="Проект будет иметь более 500 позиций товаров/услуг/доп.страниц(кроме статей)">
                                <label class="form-check-label">
                                    Проект будет иметь более 500 позиций товаров/услуг/доп.страниц(кроме статей)
                                </label>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{__('site.project_notes')}}</label>
                        <textarea class="form-control calc-descript" id="calc-descript" rows="3"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Возможно нужно добавить какие либо дополнительные
                            модули.Мы сможем их учесть при сотавлении конечной сметы сайта
                        </small>
                    </div>
                </div>



                <input type="hidden" class="dop-servis-title-hidden" value="{{__('site.dop_servis')}}">
                <input type="hidden" class="project_notes" value="{{__('site.project_notes')}}">
                <button type="submit" data-toggle="modal" data-target="#exampleModal"
                        class="btn btn-primary btn-calc-site">{{__('site.calculate the site')}}</button>
            </div>


        </div>
    </main>
    <!-- Modal -->

    <div class="modal-calc">
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-header">
                <h3 id="myModalLabel">{{__('site.question_title')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                <div class="ash-block-calc-result">

                    <div class="content-result" id="content-result">
                        Примерная стоимость проекта <span class="ash_project_name"></span> <span
                            class="ash_pryce_site_end"></span> <span class="ash_valuta"></span>
                        <p>В стоимость входят:</p>
                        Настройка Вашего проекта под ключ <br>
                        Наполнение в рамках выбранного заказа <br>
                        Бесплатная поддержка в течении месяца после сдачи проекта<br>
                        <span class="view-domain"></span><br>
                        <span class="view-host"></span><br>

                        <span class="view-dop-servis"></span>
                        <p class="calc_descript_view"></p>


                    </div>
                </div>
{{--                <form action="#">--}}
                <form action="{{route('calculate')}}" method="post" class="row">
                    <div class="form-group col-sm-6">
                        <label for="email1">E-mail:</label>

                        <input type="email" name="email" class="form-control" id="email1" placeholder="Email" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email1">{{__('site.phone')}}</label>

                        <input type="phone" name="phone" class="form-control" id="phome"  required>
                    </div>

                    <textarea id="hiddeninput" class="hiddeninput" hidden name="message"></textarea>
                    {{ csrf_field() }}
                    <div class="col-12"></div>
                    <button type="submit" class="btn btn-outline-danger btn_click_mail">{{__('site.send_message_calc')}}</button>
                </form>
            </div>
        </div>
    </div>



@endsection

