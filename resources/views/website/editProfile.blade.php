@extends('layouts.website.app')

@section('title')
{{$member->name}}
@endsection

@section('content')


<div class="user_profile">
    <div class="container">
        <div class="row">
            <div class="profile_name">
                <h3 class="p-b-30">{{$member->name}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-12">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-profile-info-tab" data-toggle="pill"
                        href="#v-pills-profile-info" role="tab" aria-controls="v-pills-profile-info"
                        aria-selected="true">@Lang('site.profile_info')</a>
                    <a class="nav-link" id="v-pills-contact-info-tab" data-toggle="pill" href="#v-pills-contact-info"
                        role="tab" aria-controls="v-pills-contact-info" aria-selected="false">@Lang('site.contact_info')</a>
                    <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab"
                        aria-controls="v-pills-password" aria-selected="false">@Lang('site.password')</a>
                </div>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile-info" role="tabpanel"
                        aria-labelledby="v-pills-profile-info-tab">
                        {{-- <div class="p-b-50">
                            <form action="" method="post">
                                <h2 class="p-b-30">Account Information</h2>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="" disabled class="form-control" value="amro_elnamory">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="" disabled class="form-control"
                                        value="amro.elnamory94@gmail.com">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div> --}}
                        <div class="p-b-60">
                            <form action="{{  route('updateMember', $member->id) }}" method="post">
                                @csrf
                                @method('put')
                                <h2 class="p-b-30">@Lang('site.profile_info')</h2>
                                <div class="form-group">
                                    <label>@Lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{$member->name}}">
                                    @error('name')
                                    <div class="text-danger fs-14">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>@Lang('site.email')</label>
                                    <input name="email" class="form-control" value="{{$member->email}}">
                                    @error('email')
                                    <div class="text-danger fs-14">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>@Lang('site.about_me')</label>
                                    <textarea name="about" rows="5" class="form-control">{{$member->about}}</textarea>
                                    @error('about')
                                    <div class="text-danger fs-14">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>@Lang('site.my_favorite_style')</label>
                                    <input type="text" name="style" class="form-control" value="{{$member->style}}">
                                    @error('style')
                                    <div class="text-danger fs-14">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">@Lang('site.update')</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade p-b-60" id="v-pills-contact-info" role="tabpanel"
                        aria-labelledby="v-pills-contact-info-tab">
                        <form action="{{  route('updateContactInfo', $member->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <h2 class="p-b-30">@Lang('site.contact_info')</h2>

                            <div class="form-group">
                                <label>@Lang('site.country')</label>

                                @if (app()->getLocale() == "ar")

                                <select name="country" class="form-control">
                                    <option value="" disabled selected>إختر</option>
                                    <option value="أفغانستان">أفغانستان</option>
                                    <option value="ألبانيا">ألبانيا</option>
                                    <option value="الجزائر">الجزائر</option>
                                    <option value="أندورا">أندورا</option>
                                    <option value="أنغولا">أنغولا</option>
                                    <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                    <option value="الأرجنتين">الأرجنتين</option>
                                    <option value="أرمينيا">أرمينيا</option>
                                    <option value="أستراليا">أستراليا</option>
                                    <option value="النمسا">النمسا</option>
                                    <option value="أذربيجان">أذربيجان</option>
                                    <option value="البهاما">البهاما</option>
                                    <option value="البحرين">البحرين</option>
                                    <option value="بنغلاديش">بنغلاديش</option>
                                    <option value="باربادوس">باربادوس</option>
                                    <option value="بيلاروسيا">بيلاروسيا</option>
                                    <option value="بلجيكا">بلجيكا</option>
                                    <option value="بليز">بليز</option>
                                    <option value="بنين">بنين</option>
                                    <option value="بوتان">بوتان</option>
                                    <option value="بوليفيا">بوليفيا</option>
                                    <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                                    <option value="بوتسوانا">بوتسوانا</option>
                                    <option value="البرازيل">البرازيل</option>
                                    <option value="بروناي">بروناي</option>
                                    <option value="بلغاريا">بلغاريا</option>
                                    <option value="بوركينا فاسو ">بوركينا فاسو </option>
                                    <option value="بوروندي">بوروندي</option>
                                    <option value="كمبوديا">كمبوديا</option>
                                    <option value="الكاميرون">الكاميرون</option>
                                    <option value="كندا">كندا</option>
                                    <option value="الرأس الأخضر">الرأس الأخضر</option>
                                    <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                                    <option value="تشاد">تشاد</option>
                                    <option value="تشيلي">تشيلي</option>
                                    <option value="الصين">الصين</option>
                                    <option value="كولومبيا">كولومبيا</option>
                                    <option value="جزر القمر">جزر القمر</option>
                                    <option value="كوستاريكا">كوستاريكا</option>
                                    <option value="ساحل العاج">ساحل العاج</option>
                                    <option value="كرواتيا">كرواتيا</option>
                                    <option value="كوبا">كوبا</option>
                                    <option value="قبرص">قبرص</option>
                                    <option value="التشيك">التشيك</option>
                                    <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                                    <option value="الدنمارك">الدنمارك</option>
                                    <option value="جيبوتي">جيبوتي</option>
                                    <option value="دومينيكا">دومينيكا</option>
                                    <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                                    <option value="تيمور الشرقية ">تيمور الشرقية </option>
                                    <option value="الإكوادور">الإكوادور</option>
                                    <option value="مصر">مصر</option>
                                    <option value="السلفادور">السلفادور</option>
                                    <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                                    <option value="إريتريا">إريتريا</option>
                                    <option value="إستونيا">إستونيا</option>
                                    <option value="إثيوبيا">إثيوبيا</option>
                                    <option value="فيجي">فيجي</option>
                                    <option value="فنلندا">فنلندا</option>
                                    <option value="فرنسا">فرنسا</option>
                                    <option value="الغابون">الغابون</option>
                                    <option value="غامبيا">غامبيا</option>
                                    <option value="جورجيا">جورجيا</option>
                                    <option value="ألمانيا">ألمانيا</option>
                                    <option value="غانا">غانا</option>
                                    <option value="اليونان">اليونان</option>
                                    <option value="جرينادا">جرينادا</option>
                                    <option value="غواتيمالا">غواتيمالا</option>
                                    <option value="غينيا">غينيا</option>
                                    <option value="غينيا بيساو">غينيا بيساو</option>
                                    <option value="غويانا">غويانا</option>
                                    <option value="هايتي">هايتي</option>
                                    <option value="هندوراس">هندوراس</option>
                                    <option value="المجر">المجر</option>
                                    <option value="آيسلندا">آيسلندا</option>
                                    <option value="الهند">الهند</option>
                                    <option value="إندونيسيا">إندونيسيا</option>
                                    <option value="إيران">إيران</option>
                                    <option value="العراق">العراق</option>
                                    <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                                    <option value="فلسطين">فلسطين</option>
                                    <option value="إيطاليا">إيطاليا</option>
                                    <option value="جامايكا">جامايكا</option>
                                    <option value="اليابان">اليابان</option>
                                    <option value="الأردن">الأردن</option>
                                    <option value="كازاخستان">كازاخستان</option>
                                    <option value="كينيا">كينيا</option>
                                    <option value="كيريباتي">كيريباتي</option>
                                    <option value="الكويت">الكويت</option>
                                    <option value="قرغيزستان">قرغيزستان</option>
                                    <option value="لاوس">لاوس</option>
                                    <option value="لاوس">لاوس</option>
                                    <option value="لاتفيا">لاتفيا</option>
                                    <option value="لبنان">لبنان</option>
                                    <option value="ليسوتو">ليسوتو</option>
                                    <option value="ليبيريا">ليبيريا</option>
                                    <option value="ليبيا">ليبيا</option>
                                    <option value="ليختنشتاين">ليختنشتاين</option>
                                    <option value="ليتوانيا">ليتوانيا</option>
                                    <option value="لوكسمبورغ">لوكسمبورغ</option>
                                    <option value="مدغشقر">مدغشقر</option>
                                    <option value="مالاوي">مالاوي</option>
                                    <option value="ماليزيا">ماليزيا</option>
                                    <option value="جزر المالديف">جزر المالديف</option>
                                    <option value="مالي">مالي</option>
                                    <option value="مالطا">مالطا</option>
                                    <option value="جزر مارشال">جزر مارشال</option>
                                    <option value="موريتانيا">موريتانيا</option>
                                    <option value="موريشيوس">موريشيوس</option>
                                    <option value="المكسيك">المكسيك</option>
                                    <option value="مايكرونيزيا">مايكرونيزيا</option>
                                    <option value="مولدوفا">مولدوفا</option>
                                    <option value="موناكو">موناكو</option>
                                    <option value="منغوليا">منغوليا</option>
                                    <option value="الجبل الأسود">الجبل الأسود</option>
                                    <option value="المغرب">المغرب</option>
                                    <option value="موزمبيق">موزمبيق</option>
                                    <option value="بورما">بورما</option>
                                    <option value="ناميبيا">ناميبيا</option>
                                    <option value="ناورو">ناورو</option>
                                    <option value="نيبال">نيبال</option>
                                    <option value="هولندا">هولندا</option>
                                    <option value="نيوزيلندا">نيوزيلندا</option>
                                    <option value="نيكاراجوا">نيكاراجوا</option>
                                    <option value="النيجر">النيجر</option>
                                    <option value="نيجيريا">نيجيريا</option>
                                    <option value="كوريا الشمالية ">كوريا الشمالية </option>
                                    <option value="النرويج">النرويج</option>
                                    <option value="سلطنة عمان">سلطنة عمان</option>
                                    <option value="باكستان">باكستان</option>
                                    <option value="بالاو">بالاو</option>
                                    <option value="بنما">بنما</option>
                                    <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                                    <option value="باراغواي">باراغواي</option>
                                    <option value="بيرو">بيرو</option>
                                    <option value="الفلبين">الفلبين</option>
                                    <option value="بولندا">بولندا</option>
                                    <option value="البرتغال">البرتغال</option>
                                    <option value="قطر">قطر</option>
                                    <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                                    <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                                    <option value="رومانيا">رومانيا</option>
                                    <option value="روسيا">روسيا</option>
                                    <option value="رواندا">رواندا</option>
                                    <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                                    <option value="سانت لوسيا">سانت لوسيا</option>
                                    <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                                    <option value="ساموا">ساموا</option>
                                    <option value="سان مارينو">سان مارينو</option>
                                    <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                                    <option value="السعودية">السعودية</option>
                                    <option value="السنغال">السنغال</option>
                                    <option value="صربيا">صربيا</option>
                                    <option value="سيشيل">سيشيل</option>
                                    <option value="سيراليون">سيراليون</option>
                                    <option value="سنغافورة">سنغافورة</option>
                                    <option value="سلوفاكيا">سلوفاكيا</option>
                                    <option value="سلوفينيا">سلوفينيا</option>
                                    <option value="جزر سليمان">جزر سليمان</option>
                                    <option value="الصومال">الصومال</option>
                                    <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                                    <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                                    <option value="جنوب السودان">جنوب السودان</option>
                                    <option value="إسبانيا">إسبانيا</option>
                                    <option value="سريلانكا">سريلانكا</option>
                                    <option value="السودان">السودان</option>
                                    <option value="سورينام">سورينام</option>
                                    <option value="سوازيلاند">سوازيلاند</option>
                                    <option value="السويد">السويد</option>
                                    <option value="سويسرا">سويسرا</option>
                                    <option value="سوريا">سوريا</option>
                                    <option value="طاجيكستان">طاجيكستان</option>
                                    <option value="تنزانيا">تنزانيا</option>
                                    <option value="تايلاند">تايلاند</option>
                                    <option value="توغو">توغو</option>
                                    <option value="تونجا">تونجا</option>
                                    <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                                    <option value="تونس">تونس</option>
                                    <option value="تركيا">تركيا</option>
                                    <option value="تركمانستان">تركمانستان</option>
                                    <option value="توفالو">توفالو</option>
                                    <option value="أوغندا">أوغندا</option>
                                    <option value="أوكرانيا">أوكرانيا</option>
                                    <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                                    <option value="المملكة المتحدة">المملكة المتحدة</option>
                                    <option value="الولايات المتحدة">الولايات المتحدة</option>
                                    <option value="أوروغواي">أوروغواي</option>
                                    <option value="أوزبكستان">أوزبكستان</option>
                                    <option value="فانواتو">فانواتو</option>
                                    <option value="فنزويلا">فنزويلا</option>
                                    <option value="فيتنام">فيتنام</option>
                                    <option value="اليمن">اليمن</option>
                                    <option value="زامبيا">زامبيا</option>
                                    <option value="زيمبابوي">زيمبابوي</option>
                                </select>

                                @error('country')
                                <div class="text-danger fs-14">{{$message}}</div>
                                @enderror

                                @else

                                <select name="country" class="form-control">
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                                @error('country')
                                <div class="text-danger fs-14">{{$message}}</div>
                                @enderror

                                @endif
                            </div>
                            <div class="form-group">
                                <label>@Lang('site.city')</label>
                            <input type="text" name="city" class="form-control" value="{{$member->city}}">
                                @error('city')
                                <div class="text-danger fs-14">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>@Lang('site.phone')</label>
                            <input type="text" name="phone" class="form-control" value="{{$member->phone}}">
                                @error('phone')
                                <div class="text-danger fs-14">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>@Lang('site.zip_code')</label>
                            <input type="text" name="zip_code" class="form-control" value="{{$member->zip_code}}">
                                @error('zip_code')
                                <div class="text-danger fs-14">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">@Lang('site.update')</button>

                        </form>

                    </div>
                    <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                        aria-labelledby="v-pills-password-tab">

                        <form action="" method="post">
                            <h2 class="p-b-20">Change Password</h2>
                            <h6 class="text-danger p-b-30"> Please use 8 or more characters with a mix of letters,
                                numbers and symbols. </h6>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="" disabled class="form-control" value="amro_elnamory">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Verify New Password</label>
                                <input type="password" name="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection