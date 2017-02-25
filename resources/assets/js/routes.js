import VueRouter from 'vue-router';


let routes=[
{
	path:'/',
	component:require('./components/Example')
},
{
	path:'/about',
	component:require('./components/About')
},
{
	path:'/vision',
	component:require('./components/Vision')
}
];

export default new VueRouter({
	routes,
	linkActiveClass: 'active'
});