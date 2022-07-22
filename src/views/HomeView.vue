<template>
    <div>
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a
                                                role="tab"
                                                id="nav-home-tab"
                                                data-toggle="tab"
                                                aria-selected="true"
                                                aria-controls="nav-home"
                                                href="details.htmlnav-home"
                                                class="nav-item nav-link active"
                                            >
                                                All
                                            </a>

                                            <a
                                                role="tab"
                                                data-toggle="tab"
                                                id="nav-profile-tab"
                                                aria-selected="false"
                                                class="nav-item nav-link"
                                                aria-controls="nav-profile"
                                                href="details.htmlnav-profile"
                                            >
                                                Lifestyle
                                            </a>

                                            <a
                                                role="tab"
                                                data-toggle="tab"
                                                id="nav-contact-tab"
                                                aria-selected="false"
                                                class="nav-item nav-link"
                                                aria-controls="nav-contact"
                                                href="details.htmlnav-contact"
                                            >
                                                Travel
                                            </a>

                                            <a
                                                role="tab"
                                                id="nav-last-tab"
                                                data-toggle="tab"
                                                aria-selected="false"
                                                class="nav-item nav-link"
                                                href="details.htmlnav-last"
                                                aria-controls="nav-contact"
                                            >
                                                Fashion
                                            </a>

                                            <a
                                                role="tab"
                                                id="nav-Sports"
                                                data-toggle="tab"
                                                aria-selected="false"
                                                class="nav-item nav-link"
                                                aria-controls="nav-contact"
                                                href="details.htmlnav-nav-Sport"
                                            >
                                                Sports
                                            </a>

                                            <a
                                                role="tab"
                                                data-toggle="tab"
                                                id="nav-technology"
                                                aria-selected="false"
                                                class="nav-item nav-link"
                                                aria-controls="nav-contact"
                                                href="details.htmlnav-techno"
                                            >
                                                Technology
                                            </a>

                                            <div class="row mt-2">
                                                <div class="search-box ml-100">
                                                    <form action="details.html">
                                                        <input type="text" placeholder="Search" v-model="getPostTitle" v-on:keyup.enter="searchPost()"/>
                                                        <i class="fas fa-search special-tag ml-15 pointer" @click="searchPost()"></i>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                             </div>
                        </div>
                     </div>
                </div>

                <div class="row">
                    <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div
                        class="tab-pane fade show active"
                        id="nav-home"
                        role="tabpanel"
                        aria-labelledby="nav-home-tab"
                        >
                        <div class="whats-news-caption">
                            <div class="row" v-for="(post, index) in posts" :key="index">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-what-news mb-100">
                                        <div class="what-img">
                                        <img
                                            :src="'http://localhost:8000' + post.image"
                                            alt=""
                                        />
                                        </div>
                                        <div class="what-cap">
                                        <span class="color1">{{ post.title }}</span>
                                        <h4>
                                            <a href="details.html">
                                                {{ post.description }}
                                            </a>
                                        </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                        <a class="page-link" href="details.html"><span class="flaticon-arrow roted"></span></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="details.html">01</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="details.html">02</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="details.html">03</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="details.html"><span class="flaticon-arrow right-arrow"></span></a>
                                    </li>
                                </ul>
                             </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="../js/homeview.js"></script>
