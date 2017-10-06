
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
@extends('layouts.app')
 
@section('content')
 
<div class="row">
 
   <div class="col-md-2">
 
       <ul class="list-group">
 
       @foreach($users as $chatuser)
 
           <li v-on:click="getUserId" class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</li>
 
       @endforeach
 
           
 
       </ul>
 
   </div>
 
<div class="col-md-10">
 
<div class="row">
 
   <div class="col-md-4" v-for="(chatWindow,index) in chatWindows" v-bind:sendid="index.senderid" v-bind:name="index.name">
 
       <div class="panel panel-primary">
 
           <div class="panel-heading" id="accordion">
 
               <span class="glyphicon glyphicon-comment"></span> @{{chatWindow.name}}
 
           </div>
 
           <div class="panel-collapse" id="collapseOne">
 
               <div class="panel-body">
 
                   <ul class="chat" id="chat">
 
                       <li class="left clearfix" v-for="chat in chats[chatWindow.senderid]" v-bind:message="chat.message" v-bind:username="chat.username">
 
                       <span class="chat-img pull-left">
 
                       <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
 
                       </span>
 
                       <div class="chat-body clearfix">
 
                       <div class="header">
 
                       <strong class="primary-font"> @{{chat.name}}</strong>
 
                       </div>
 
                       <p>@{{chat.message}}</p>
 
                       </div>
 
                       </li>                                
 
                   </ul>
 
           </div>
 
               <div class="panel-footer">
 
                   <div class="input-group">
 
                       <input :id="chatWindow.senderid" v-model="chatMessage[chatWindow.senderid]" v-on:keyup.enter="sendMessage2" type="text" class="form-control input-md" placeholder="Type your message here..." />
 
                       <span class="input-group-btn"><button :id="chatWindow.senderid" class="btn btn-warning btn-md" v-on:click="sendMessage2">
 
                               Send</button></span>
 
                   </div>
 
               </div>
 
           </div>
 
       </div>
 
   </div>
 
</div>
 
</div>
 
</div>
 
@endsection