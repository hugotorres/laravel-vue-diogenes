<template>
                <div class="col-sm-4">
                    <div class="card ">
                        <div class="card-header">{{category.title}}</div>
                        <div class="card-body">
                            <img src="images/{{$category->image}}" class="rounded mx-auto d-block"alt="{{category.title}}">
                            {{category.description}}
                            <call-to-action :number="{{32}}"><img src="images/{{category.icon}}" width="32" alt="{{category.title}}"></call-to-action>

                        </div>
                                       </div>
                </div>

</template>