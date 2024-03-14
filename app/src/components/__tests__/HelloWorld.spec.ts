import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import HelloWorld from '../HelloWorld.vue'

describe('HelloWorld', () => {
  it('renders properly', () => {
    const msg = 'Hello Vitest';
    const wrapper = mount(HelloWorld, { props: { msg: msg } });
    expect(wrapper.text()).toContain(msg);
  })
})
