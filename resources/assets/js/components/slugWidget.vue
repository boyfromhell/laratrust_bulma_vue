<style scoped>
  .slug-widget {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }
  .wrapper {
    margin-left: 8px;
  }
  .slug {
    background-color: #fdfd96;
    padding: 3px 5px
  }
  .input {
    width: auto;
  }
  .url-wrapper {
    display: flex;
    align-items: center;
    height: 28px;
  }
</style>

<template>
  <div class="slug-widget">
    <div class="icon-wrapper wrapper">
      <i class="fa fa-link"></i>
    </div>
    <div class="url-wrapper wrapper">
      <span class="root-url">{{url}}</span
      ><span class="subdirectory-url">/{{subdirectory}}/</span
      ><span class="slug" v-show="slug && !isEditing">{{slug}}</span
      ><input type="text" name="slug" class="input is-small" v-show="isEditing" v-model="customSlug"/>
    </div>

    <div class="button-wrapper wrapper">
      <button class="save-slug-button button is-small" v-show="!isEditing" @click.prevent="editSlug">Edit</button>
      <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="saveSlug">Save</button>
      <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="resetEditing">Reset</button>
    </div>
  </div>
</template>

<script>
    export default {
      props: {
        url: {
          type: String,
          required: true
        },
        subdirectory: {
          type: String,
          required: true
        },
        title: {
          type: String,
          required: true
        }
      },
      data: function() {
        return {
          slug: this.setSlug(this.title),
          isEditing: false,
          customSlug: '',
          wasEdited: false,
          api_token:this.$root.api_token
        }
      },
      methods: {
        editSlug: function() {
          this.customSlug = this.slug;
          this.$emit('edit', this.slug);
          this.isEditing = true;
        },
        saveSlug: function() {
          // run ajax to see if new slug is unique
          if (this.customSlug !== this.slug) this.wasEdited = true;
          this.setSlug(this.customSlug)
          this.$emit('save', this.slug);
          this.isEditing = false;
        },
        resetEditing: function() {
          this.setSlug = this.title;
          this.$emit('reset', this.slug);
          this.wasEdited = false;
          this.isEditing = false;
        },
        setSlug: function(newVal, count=0){
          //slugify newval
          var slug = Slug(newVal + (count > 0 ? '-' + count : ''));
          let vm=this; //vue module for axios
          // this.slug="test";
          
          if(this.api_token && slug){
            this.slug=slug;
            //test to see it unique
          axios.get('/laratrust_bulma_vue/public/api/posts/unique', {
            params:{
              api_token:vm.api_token ,
              slug:slug
            }
          }).then(function(responce){
            //if unique set slug and emit event
            if(responce.data){
              vm.slug=slug;
              vm.$emit('slug-changed', slug)
            }else{
              //if not, customize the slug to make it unique and test again
              vm.setSlug(newVal, count+1)
            }
          }).catch(function(error){
            console.log(error);
          })
          
        }
          }
          
      },
      watch: {
        title: _.debounce(function() {
            if (this.wasEdited == false) this.setSlug (this.title);
          }, 500),
      }
    }
</script>